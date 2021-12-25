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

    public function index($userId)
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

        return view('testfollow')->with('userId',$userId)->with('followsUser',$followsUser);
    }



    /**
     * followerPage(): Displays a page containing the follower and following list of an user
     * 
     * 
     * @urlParam userId integer required User Id of the user whos follower and following list is being displayed
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
     * Finally, the user gets redirected to the profile page of the user he just followed.
     * 
     * @urlParam followingUserId integer required The Id of the user who is being followed.
     * 
     * @response scenario=success {"message": User is successfully followed}
     * 
     * @response scenario=failure {unable to follow user}
     *
     */

    public function followUser($followingUserId)
    {
        $followerUserId = Session::get('u_id');

        $follow = FollowerList::create([
        "follower_uid" => $followerUserId,
        "following_uid" =>$followingUserId,
        ]);

        return redirect('/test-follow/'.$followingUserId);

    }

    /**
     * unfollowUser(): Allows a user to the unfollow another user.
     * 
     * This method takes the parameter '$unfollowingUserId' from the route url. This parameter
     * contains the 'user ID' of the user who is being unfollowed by the current logged in user. The userId of the 
     * current logged in user is saved in the variable '$followerUserId'.<br> 
     * The row containing the user Id of the unfollower and the user Id of user who is being unfollowed 
     * is deleted 'follower_list' table of the database by using the 'FollowerList' model.<br>
     * Finally, the user gets redirected to the profile page of the user he just unfollowed.
     * 
     * @urlParam unfollowingUserId integer required The Id of the user who is being unfollowed.
     * 
     * @response scenario=success {"message": User is successfully unfollowed}
     * 
     * @response scenario=failure {unable to unfollow user}
     *
     */

    public function unfollowUser($unfollowingUserId)
    {
        $unfollowerUserId = Session::get('u_id');

        $unfollow = FollowerList::where('follower_uid','=',$unfollowerUserId)
                    ->where('following_uid','=',$unfollowingUserId);         

        $unfollow->delete();

        return redirect('/test-follow/'.$unfollowingUserId);
    }
}
