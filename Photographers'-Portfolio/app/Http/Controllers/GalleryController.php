<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blogs;
use Session;

class GalleryController extends Controller
{
    /**
     * @param mixed $userId
     * 
     * @return [type]
     */
    public function gallery ($userId){


        //getting the userId of the logged in user
        $userId = Session::get('u_id');
        $userId = [$userId];


        //getting the photos uploaded from users who are followed by the current logged in user.
        //the query results are generated in descending order of upload date
        $photos= Photos::whereIn('u_id',$userId)->orderBy('created_at','desc')->get();

        $blogs = Blogs::whereIn('u_id',$userId)->orderBy('created_at','desc')->get();

        //merges all blogs and photos together
        $allGalleryPosts = $photos->concat($blogs);

        //Sorts all posts in descending order of upload date
        $allGalleryPostsSorted = $allGalleryPosts->sortByDesc('created_at');
        return view('gallery')->with('allPostsSorted',$allGalleryPostsSorted);
    } 
}
