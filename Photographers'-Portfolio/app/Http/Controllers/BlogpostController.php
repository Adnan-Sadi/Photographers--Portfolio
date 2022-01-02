<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Session;


/**
 * @group BlogpostController class
 *
 * The methods inside this class are used for creating or 
 * viewing a single blog on this web application.
 */

class BlogpostController extends Controller
{

    
    /**
     * blogpost() : this method shows the view of a blog creation form <br>
     * 
     * blogs are posts made by users that contain text writings and each blog has a cover image on top
     * as well
     * 
     * 
     * 
     * @urlparam Request $request
     * 
     * @response { return \Illuminate\View\View }
     */
    public function blogpost (Request $request){
        
        return view('blogpost');
    }


    /**
     * 
     * @response { return \Illuminate\View\View }
     */
    public function create(){
        return view('blogpost.create');
        
    }
    

    /**
     * store() : Stores a newly created blog post in storage
     * 
     * @urlparam \Illuminate\Http\Request $request
     * @response \Illuminate\Http\Response
     */


    public function store(Request $request){
        
        //setting validation rules
        $rules = array(
            'title '=> 'required',
            'text_writings' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:5048'
        );

        $error= Validator::make($request->all(), $rules);

        //getting userId and userName from session
        $userId = Session::get('u_id');
        $userName = Session::get('username');

        $coverPhotoName = time(). '-'. $userName .'-'.Str::random(3).'.'. $request->cover_photo->extension();
        $request->cover_photo->move(public_path('photos/cover-images'),$coverPhotoName); //store image to storage



        // If it is valid, it will proceed
        // If it is not valid, throws a ValidationException.

        
        $blogs = Blogs::create([
            'u_id'       => $userId,
            'title' => $request->input('title'),
            'text_writings' => $request->input('text_writings'),
            'cover_photo' => $coverPhotoName
        ]);
        return redirect('/single-blog/'.$blogs->b_id);
    }
    
    
    
    // public function edit($id){
    //     $blogs = Blogs::find($id)->first();
    //     return view('blogs.edit')->with('blogs', $blogs);
    // }
    
    
    /**
     * @urlparam Request $request
     * @urlparam mixed $id
     * 
     * @response \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $rules = array(
            'title '=> 'required',
            'text_writings' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:5048'
        );

        $blogs = Blogs::where('id', $id)
        ->update([
            'title' => $request->input('title'),
            'text_writings' => $request->input('blogtext')
        ]);
        return redirect('/single-blog');
    }


    /**
     * blog() : Displays the view of an individual blog.
     * 
     * This method takes the parameter '$blogId' from the route url.
     * The '$blogId' is used to find the particular blog with the same blogId from the database.
     * All the data about that blog is stored inside a laravel 'Collection Object'.
     * The function returns a view of the 'single blog' page along with the 'Collection Object'
     * which contains the blog data.
     *
     *@bodyparam blogId integer required The ID of the blog
     * 
     *@response {
     *  "b_id": 4,
     *  "u_id": 2,
     *  "text_writings": "This is an example text writing",
     *  "created_at": "2021-12-22 07:50:02",
     *  "updated_at": "2021-12-22 07:50:02",
     * }
     */


    public function blog ($blogId){


        //getting the userId of the logged in user
        $userId = Session::get('u_id');
        $blogId = [$blogId];

        $blog = Blogs::whereIn('b_id',$blogId)->orderBy('created_at','desc')->first();

        //Sorts all posts in descending order of upload date
        return view('single-blog')->with('blog',$blog);
    } 


}
