<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blogs;
use App\Models\FollowerList;
use Session;

/**
 * @group NewsfeedController class
 *
 * The methods inside this class are used displaying the
 * newsfeed of an user.
 */

class NewsfeedController extends Controller
{

    
    /**
     * index(): Displays the view of the Newsfeed.
     *
     * This method returns the view of the newsfeed an user.<br>
     * First, it finds the 'userId' of the logged in user from the Session variable.
     * Then, that 'userId' is used to find all the users that user is following.
     * Using the list of users that were followed, this function retrieves
     * all photos and blogs that were posted by those users. Data about about all the 
     * photos and blogs are stored inside a laravel 'Collection Object'.<br>
     * Finally, the method return the view of the 'newsfeed' page along with the 'Collection
     * Object' which contains data about photos and blogs.
     * 
     */
    public function index()
    {
        //getting the userId of the logged in user
        $userId = Session::get('u_id');

        //getting the userIds of the users being followed
        $followingList = FollowerList::select('following_uid')
                                       ->where('follower_uid','=',$userId)
                                       ->get();
        
        //plucking only the userIds as an array from the $followingList collection
        $followingUserIds = $followingList->pluck('following_uid');
        $followingUserIds->push($userId);

        //getting the photos uploaded from users who are followed by the current logged in user.
        //the query results are generated in descending order of upload date
        $newsfeedPhotos= Photos::whereIn('u_id',$followingUserIds)
                                 ->orderBy('created_at','desc')->get();

        //dd($newsfeedPhotos);
        $blogs = Blogs::whereIn('u_id',$followingUserIds)
                        ->orderBy('created_at','desc')->get();

        //merges all blogs and photos together
        $allPosts = $newsfeedPhotos->concat($blogs);
   
        //Sorts all posts in descending order of upload date
        $allPostsSorted = $allPosts->sortByDesc('created_at');

        return view('newsfeed')->with('allPostsSorted',$allPostsSorted);
    }
  


}
