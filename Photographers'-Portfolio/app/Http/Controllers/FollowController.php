<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowerList;
use Session;

/**
 * @group FollowController class
 *
 * The methods inside this class are used for implemententing 
 * features such as 'follow user', 'unfollow user' and 'display follower
 * and following List' 
 * 
 */
class FollowController extends Controller
{
    /**
     * isFollowing(): Checks if the logged-in user is following a certain user.
     * 
     * This methods takes '$userId' as a parameter and checks if the logged in user
     * is following that particular 'userId'. The function returns true if the logged-in
     * user is following a certain user and returns false if the user is not following
     * that certain user.
     * 
     * @bodyParam $userId integer required The user of a particular user.
     * 
     * @response { return Boolean }
     */

    public function isFollowing($userId)
    {
        $followerUserId = Session::get('u_id');

        $following = FollowerList::where('follower_uid','=',$followerUserId)
                     ->where('following_uid','=',$userId)
                     ->get();


        if($following->isEmpty())
        {
            $followsUser = false;
        }
        else
        {
            $followsUser = True;
        }

        return $followsUser;
    }



    /**
     * followerPage(): Displays a page containing the follower and following list of an user
     * 
     * This method takes '$userId' as a parameter from the URL.This user id is of the user whos
     * follower/following page is being viewed.<br>
     * This is 'userId' is then used to find which user are following that userId and also to find
     * which users are being followed by that userId.<br>
     * Finally, the function returns a view of the 'followerpage' along with two collection
     * objects which contains the list of followers and the list of user being followed by 
     * that particular userId.
     * 
     * @urlParam userId integer required User Id of the user whos follower and following list is being displayed.
     * 
     * @response { return \Illuminate\View\View }
     */
    public function followerPage($userId)
    {
        //getting the userIds of the followers
        $followerList = FollowerList::select('follower_uid')
                   ->where('following_uid','=',$userId)
                   ->get();

        //plucking only the userIds as an array from the $followerList collection
        $followerIds = $followerList->pluck('follower_uid');            

        //getting the follower's data from user table
        $followers = User::whereIn('u_id',$followerIds)
                     ->orderBy('username','asc')->get();

        //getting the userIds of the users being followed
        $followingList = FollowerList::select('following_uid')
                   ->where('follower_uid','=',$userId)
                   ->get();

        //plucking only the userIds as an array from the $followingList collection
        $followingIds = $followingList->pluck('following_uid'); 
        
        //getting the follower's data from user table
        $followings = User::whereIn('u_id',$followingIds)
                     ->orderBy('username','asc')->get();
                   
        
        return view('followerpage')->with('followers',$followers)->with('followings',$followings);
    }

    /**
     * followUser(): Allows a user to the follow another user.
     * 
     * This method takes the parameter '$followingUserId' from the route url. This parameter
     * contains the 'user ID' of the user who is being followed by the current logged in user. The userId of the 
     * current logged in user is saved in the variable '$followerUserId'.<br> 
     * The user Id of the follower and the user Id of user who is being followed are added to the 'follower_list' 
     * table of the database by using the 'FollowerList' model.<br>
     * Finally, the user gets redirected to the page from which the follow request came from.
     * 
     * @urlParam followingUserId integer required The Id of the user who is being followed.
     * 
     * @response { return \Illuminate\View\View }
     *
     */

    public function followUser($followingUserId)
    {
        $followerUserId = Session::get('u_id');

        $follow = FollowerList::create([
        "follower_uid" => $followerUserId,
        "following_uid" =>$followingUserId,
        ]);

        return redirect()->back();

    }

    /**
     * unfollowUser(): Allows a user to the unfollow another user.
     * 
     * This method takes the parameter '$unfollowingUserId' from the route url. This parameter
     * contains the 'user ID' of the user who is being unfollowed by the current logged in user. The userId of the 
     * current logged in user is saved in the variable '$followerUserId'.<br> 
     * The row containing the user Id of the unfollower and the user Id of user who is being unfollowed 
     * is deleted 'follower_list' table of the database by using the 'FollowerList' model.<br>
     * Finally, the user gets redirected to the page from which the unfollow request came from.
     * 
     * @urlParam unfollowingUserId integer required The Id of the user who is being unfollowed.
     * 
     * @response scenario=success { return \Illuminate\View\View }
     *
     */

    public function unfollowUser($unfollowingUserId)
    {
        $unfollowerUserId = Session::get('u_id');

        $unfollow = FollowerList::where('follower_uid','=',$unfollowerUserId)
                    ->where('following_uid','=',$unfollowingUserId);         

        $unfollow->delete();

        return redirect()->back();
    }
}
