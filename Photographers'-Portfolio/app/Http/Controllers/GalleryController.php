<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blogs;
use App\Http\Controllers\FollowController;
use Session;

class GalleryController extends Controller
{
    /**
     * @param mixed $userId
     * 
     * @return [type]
     */
    public function gallery ($userId){

        $user = User::find($userId);


        //getting the photos uploaded from users who are followed by the current logged in user.
        //the query results are generated in descending order of upload date
        $photos= Photos::where('u_id',$userId)->orderBy('created_at','desc')->get();

        $blogs = Blogs::where('u_id',$userId)->orderBy('created_at','desc')->get();

        //merges all blogs and photos together
        $allGalleryPosts = $photos->concat($blogs);

        //Sorts all posts in descending order of upload date
        $allGalleryPostsSorted = $allGalleryPosts->sortByDesc('created_at');

        //checking if the viewer is following the user whos gallery is being viewed
        $isFollowing = (new FollowController)->isFollowing($userId);

        return view('gallery')->with('allPostsSorted',$allGalleryPostsSorted)
                              ->with('user',$user)->with('isFollowing',$isFollowing);
        
    } 
}
