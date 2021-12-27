<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blogs;
use Session;

class GalleryController extends Controller
{
    public function gallery ($userId){


        //getting the userId of the logged in user
        $userId = Session::get('u_id');


        //getting the photos uploaded from users who are followed by the current logged in user.
        //the query results are generated in descending order of upload date
        $photo= Photos::where('u_id',$userId);

        $blogs = Blogs::where('u_id',$userId);

        //merges all blogs and photos together
        $allGalleryPosts = $photo->concat($blogs);

        //Sorts all posts in descending order of upload date
        $allGalleryPostsSorted = $allGalleryPosts->sortByDesc('created_at');
        return view('gallery')>with('allPostsSorted',$allGalleryPostsSorted);
    } 
}
