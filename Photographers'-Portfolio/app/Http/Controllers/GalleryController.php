<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blogs;
use Session;

/**
 * @group GalleryController class
 *
 * The methods inside this class are used for uploading or 
 * viewing a single photo on this web application.
 */

class GalleryController extends Controller
{
    /**
     * gallery(): Displays the view of the Gallery.
     *
     * This method returns the view of the gallery of a user.<br>
     * First, it finds the 'userId' of the logged in user from the Session variable.
     * 
     * 
     * Then, the found 'userId' is used to find all the posts made by that user. All blogs and photos are
     * listed.
     * 
     * Data about about all the photos and blogs are stored inside a laravel 'Collection Object'.<br>
     * Finally, the method return the view of the 'gallery' page along with the 'Collection
     * Object' which contains data about photos and blogs.
     * 
     * 
     * @bodyparam mixed $userId
     * @response { return \Illuminate\View\View }
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

        return view('gallery')->with('allPostsSorted',$allGalleryPostsSorted)->with('user',$user);
        
    } 
}
