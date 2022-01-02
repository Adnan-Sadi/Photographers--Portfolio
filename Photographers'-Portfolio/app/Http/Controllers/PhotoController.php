<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Photos;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;
use File;
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
     * All the data about that photo is stored inside a laravel 'Collection Object'.<br> 
     * Finally, the function returns a view of the 'photopage' along with the 'Collection Object'
     * which contains the photo data.
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
        //getting userId from session
        $userId = Session::get('u_id');

        if($photo->u_id == $userId)
        {
            $showDeleteButton=true;
        }
        else
        {
            $showDeleteButton=false;
        }

        return view('photopage')->with('photo',$photo)->with('showDeleteButton',$showDeleteButton);
    }


    /**
      * photoUploadPage(): Display the view of the photo upload page.
      * 
      * This method returns the view of the photo upload page where the users can
      * upload photos.
      *
      * @response { return \Illuminate\View\View }
      */
    public function photoUploadPage()
    {
        return view('photouploadpage');
    }



    /**
     * textOnImage() : creates a watermark on the photo.
     * 
     * This method creates a watermark on photo while uploading.
     * Font can be customized and the position of the watermark can be
     * changed from this method as well.
     * 
     * @bodyParam newImageName string required Name of the Image.
     * @bodyParam userName string required Name of the user.
     * 
     * @response { return \Illuminate\View\View }
     */
    public function textOnImage($newImageName, $userName)  
    {  
       $img = Image::make(public_path('photos/photo-uploads/'.$newImageName));  
       $img->text($userName, 120, 100, function($font) {  
          $font->file(public_path('css/css/fonts/MajorMonoDisplay-Regular.ttf'));  
          $font->size(70);  
          $font->color('#ffffff');  
          $font->align('left');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
       $img->save(public_path('photos/photo-uploads/'.$newImageName));  
    }

     /**
     * photoUpload(): Store a newly uplaoded photo in database.
     *
     * This method takes a form request parameter '$request' as a method parameter.
     * The '$request' parameter contains two parameters which contains the values that were submitted with
     * the 'photo upload form' and these two parameters are 'caption' and 'photo'.<br>
     * Here, the method validates the form data received from the '$request' variable and returns error messages 
     * if the request fails to validate.
     * The uploaded image file is given a new name and stored in the storage.<br>   
     * Next, the method stores the necesary informations about the photo in the database by creating a 
     * new row in the 'photos' table within the database.<br>  
     * Finally, it redirects the user to the page of the photo that was uploaded.
     * 
     * 
     * @bodyParam caption string The caption of the photo.
     * @bodyParam photo file required The uploaded image file
     * 
     * @response scenario=success { return \Illuminate\View\View }
     * 
     * @response scenario=failure { form data failed to validate }
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
            return redirect('/photo-upload-page')->withErrors($error)->withInput();
        }
        
        //getting userId and userName from session
        $userId = Session::get('u_id');
        $userName = Session::get('username');

        //setting a new name for the file
        $newImageName = time(). '-'. $userName .'-'.Str::random(3).'.'. $request->photo->extension();
        $request->photo->move(public_path('photos/photo-uploads'),$newImageName); //store image to storage

        $photo = Photos::create([
        'u_id'       => $userId,
        'caption'    => $request->input('caption'),
        'photo_path' => $newImageName,
        ]);

        //Adding Watermark to Image
        $this->textOnImage($newImageName, $userName);

        
        return redirect('/photo/'. $photo->p_id);
    }


    /**
     * photoDelete(): Deletes a photo from Database.
     *
     * This methods the parameter '$photoId' from the url, which is the 
     * photo id of the photo the user requested to delete.<br> 
     * Using this photo id the function finds the photo from the database
     * and deletes all the information related to the photo from the database. It 
     * also deletes the photo from the storage as well.<br>
     * Finally, the function redirects the user to the view of the newsfeed page.
     *
     * @urlParam photoId integer required The ID of the photo
     * 
     * @response scenario=success { return \Illuminate\View\View }
     * 
     */
    public function photoDelete($photoId){
        $photo = Photos::find($photoId);

        //Delete previous photo from storage
        if(File::exists(public_path('photos/photo-uploads/'.$photo->photo_path))){
            File::delete(public_path('photos/photo-uploads/'.$photo->photo_path));
        }

        $photo->delete();
        return redirect('/newsfeed');
    }

    
}
