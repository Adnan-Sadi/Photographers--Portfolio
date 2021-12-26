<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Photos;

use Illuminate\Http\Request;
use Session;

/**
 * @group PhotoController class
 *
 * The methods inside this class are used for uploading or
 * viewing a single photo on this web application.
 */

class PhotoController extends Controller
{
    /**
     * index(): Display the view of an individual photo.
     *
     * This method takes the parameter '$photoId' from the route url.
     * The '$photoId' is used to find the particular photo with the same photoId from the database.
     * All the data about that photo is stored inside the '$photo' variable.
     * Finally, the function returns a view of the 'photopage' with the '$photo' variable.
     *
     * @urlParam photoId integer required The ID of the photo
     *
     * @response {
     *  "p_id": 4,
     *  "u_id": 2,
     *  "caption": "This is an example caption",
     *  "photo_path": "example-photo.jpg",
     *  "created_at": "2021-12-22 08:58:02",
     *  "updated_at": "2021-12-22 08:58:0",
     * }
     */
    public function index($photoId)
    {
        //finding data about the photo with the particular $photoId
        $photo = Photos::find($photoId);

        return view('photopage')->with('photo',$photo);
    }

    /**
     * photoUpload(): Store a newly uplaoded photo in database.
     *
     * This method takes a form request parameter '$request' as a method parameter.
     * The '$request' parameter contains two parameters which contains the values that were submitted with
     * the 'photo upload form'.These two parameters are 'caption' and 'photo'.
     * Here, the method validates the form data received from the '$request' variable and returns error messages
     * if the request fails to validate.
     * The image file is given a new name and stored in the storage.
     * Finally, the methods stores the necesary informations about the photo in the database by creating a
     * new row in the 'photos' table within the database.
     *
     *
     * @bodyParam caption string The caption of the photo.
     * @bodyParam photo file required The uploaded image file
     *
     * @response scenario=success {"message": photo is uploaded}
     *
     * @response scenario=failure {"message": form data failed to validate}
     */
    public function photoUpload(Request $request)
    {
        //setting validation rules
        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        //checking validation rules against all variables in $request
        $error = Validator::make($request->all(), $rules);

        //return error if exists
        if ($error->fails()) {
            return redirect('/')->withErrors($error)->withInput();
        }

        //getting userId and userName from session
        $userId  =Session::get('u_id');
        $userName = Session::get('username');

        $newImageName = time(). '-'. $userName .'-'.Str::random(3).'.'. $request->photo->extension();
        $request->photo->move(public_path('photos/photo-uploads'),$newImageName); //store image to storage

        $photo = Photos::create([
        'u_id'       => $userId,
        'caption'    => $request->input('caption'),
        'photo_path' => $newImageName,
        ]);

        return redirect('/photo/'. $photo->p_id);
    }


}
