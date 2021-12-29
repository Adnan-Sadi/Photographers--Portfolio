<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Session;

class BlogpostController extends Controller
{



    /**
     * @param Request $request
     * 
     * @return [type]
     */
    
    public function blogpost (Request $request){
        
        return view('blogpost');
    }


    public function create(){
        return view('blogpost.create');
        
    }
    

    /**
     * Store a newly created post in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
        return redirect('/single-blog/blogs');
    }
    public function edit($id){
        $blogs = Blogs::find($id)->first();
        return view('blogs.edit')->with('blogs', $blogs);
    }
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
     * blog(): Displays the view of an individual blog.
     * 
     * This method takes the parameter '$blogId' from the route url.
     * The '$blogId' is used to find the particular blog with the same blogId from the database.
     * All the data about that blog is stored inside a laravel 'Collection Object'.
     * The function returns a view of the 'single blog' page along with the 'Collection Object'
     * which contains the blog data.
     *
     * @urlParam blogId integer required The ID of the blog
     * 
     * @response {
     *  "b_id": 4,
     *  "u_id": 2,
     *  "text_writings": "This is an example text writing",
     *  "created_at": "2021-12-22 08:58:02",
     *  "updated_at": "2021-12-22 08:58:0",
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
