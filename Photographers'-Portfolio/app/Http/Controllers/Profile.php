<?php



namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


use Illuminate\Support\Facades\Cache;
use Session;

use Illuminate\Http\Request;

class Profile extends Controller
{
    protected $user;
    public function index(User $user) {



        $loggedInUser = Session::get('u_id');
        $userName = Session::get('username');

        $follows = ($loggedInUser) ? $loggedInUser->following->contains($user->u_id) : false;

        $showFollowBtn = true;
        if ($loggedInUser->u_id == $user->u_id)
        $showFollowBtn = false;

        return view('user' ,compact('user', 'showFollowBtn'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('editprofile', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => '',
            'bio' => '',
            'url' => '',
            'image' => ''
        ]);


        return redirect('/user/' . $user->u_id);
    }
}
