<?php



namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\Cache;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
class Profile extends Controller
{
/**
 *  profile(): Display the view of an individual profile.
 * When the user found logged in shows the user data
 *
 * @param User $user
 * @return void
 */
    public function  profile( User $user ) {

        $loggedInUser = Session::get('u_id');
        $userName = Session::get('username');
        $fullname=Session::get('full_name');
        $email=Session::get(' email');

        if ($loggedInUser->u_id == $user->u_id)

        return view('profile')->with('username',$userName)
        ->with('full_name',$fullname)->with('email',$email) ;



        /**
         * Validate user for update input data
         */

        public function update(User $user)
        {
            $this->authorize('update',  $user->u_id);

            $data = request()->validate([

                'bio' => '',

                'profile_image' => ''
            ]);
    /**
     * user image update
     * Storing the image path through save()
     */

            if (request('profile_image')) {
                $imagePath = request('image')->store('user', 'public');

                $image = Image::make(public_path("storage/{$imagePath}"))->fit('512', '512');
                $image->save();

                $imageArr = ['profile_image' => $imagePath];
            }

            if ($loggedInUser->u_id == $user->u_id)
                update(array_merge(
                $data, $imageArr ?? [])
            );

            return redirect('/profile/' . $user->u_id);
        }



}


 
