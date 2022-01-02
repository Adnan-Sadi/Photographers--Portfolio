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
     * blogpost() : this method shows the view of a blog creation form
     * 
     * blogs are posts made by users that contain text writings. Each blog has a cover image on top
     * as well. It also has an individual blog viewing page. User can share their written texts in the 
     * blogs. 
     * 
     * 
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
     * This method stores the created blog post in the storage. It takes the parameter '$userId' from the route url.
     * All the data about that blog is stored inside a laravel 'Collection Object'.
     * The function returns a view of the 'single blog' page along with the 'Collection Object'
     * which contains the blog data.
     * 
     * @urlParam \Illuminate\Http\Request $request
     * @response { return \Illuminate\View\View }
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
    
    
    

    
    /**
     * @urlParam Request $request
     * @urlParam mixed $id
     * 
     * @response { return \Illuminate\View\View }
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
     *
     * @urlParam blogId integer required The ID of the blog
     * 
     * @response {
     *  "b_id": 4,
     *  "u_id": 2,
     * "title": "Example",
     * "cover_photo": "1640627401-username-CJ9.jpg"
     *  "text_writings": "This is an example text writing",
     *  "created_at": "2021-12-27 07:50:02",
     *  "updated_at": "2021-12-27 07:50:02",
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
