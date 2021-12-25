<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use session;

class BlogpostController extends Controller
{

    /**
     * Displays a listing of the resource.
     * @return \Illuminate\Http\Response
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


    public function store(CreateValidationRequest $request){
        

        $request->validate([
            'title '=> 'required',
            'text_writings' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);


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
        return redirect('/blogs');
    }
    public function edit($id){
        $blogs = Blogs::find($id)->first();
        return view('blogs.edit')->with('blogs', $blogs);
    }
    public function update(CreateValidationRequest $request, $id){
        $request->validated();
        $blogs = Blogs::where('id', $id)
        ->update([
            'title' => $request->input('title'),
            'text_writings' => $request->input('blogtext')
        ]);
        return redirect('/blogpost');
    }
}
