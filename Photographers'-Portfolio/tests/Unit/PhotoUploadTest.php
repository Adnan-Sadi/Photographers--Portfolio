<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use File;

use Illuminate\Foundation\Testing\WithFaker;

class PhotoUploadTest extends TestCase
{
    
    /**
     * Tests that the route to the photo upload page exists.
     * 
     */
    public function testRouteForPhotoUploadPageExists()
    {
        $response = $this->get('/photo-upload-page');   
        $response->assertStatus(200);
    }

    /**
     * Tests what happens when both cpation and photo exists inside form request.
     * The expected result is that the validation result does not fail.
     */
    public function testBothCaptionAndPhotoExists()
    {
        //expected value is validation does not fail
        $expected = false;
        
        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => 'test caption',
            'photo' => UploadedFile::fake()->image('avatar.png')
        ]);

        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when both cpation and photo exists inside form request.
     * The expected result is that the validation result will fail.
     */
    public function testBothCaptionAndPhotoIsNull()
    {
        //expected value is validation does not fail
        $expected = True;
        
        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => null,
            'photo' => null
        ]);

        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when cpation is null but photo exists inside form request.
     * The expected result is that the validation result does not fail.
     */
    public function testCaptionIsNullButPhotoExists()
    {
        //the expected value is validation does not fail
        $expected = false;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => null,
            'photo' => UploadedFile::fake()->image('avatar.jpeg')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when caption exists but photo is null.
     * The expected result is that the validation result will fail.
     */
    public function testCpationExistsButPhotoIsNull()
    {
        //the expected value is validation fails
        $expected = True;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => 'test caption',
            'photo' => null
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the photo is of type jpg/png/jpeg.
     * The expected result is that the validation result does not fail.
     */
    public function testPhotoIsOfTypePngOrJpgOrJpeg()
    {
        //the expected value is validation does not fail
        $expected = false;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => 'test comment',
            'photo' => UploadedFile::fake()->image('avatar.png')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the photo is not of type jpg/png/jpeg.
     * The expected result is that the validation result will fail.
     */
    public function testPhotoIsNotOfTypePngOrJpgOrJpeg()
    {
        //the expected value is validation fails
        $expected = True;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => null,
            'photo' => UploadedFile::fake()->image('avatar.gif')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the photo size does not exceed limit.
     * The expected result is that the validation result does not fail.
     */
    public function testPhotoSizeDoesNotExceedLimit()
    {
        //the expected value is validation fails
        $expected = false;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => null,
            'photo' => UploadedFile::fake()->image('avatar.jpeg')->size(9048)
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the photo size is too large.
     * The expected result is that the validation result will fail.
     */
    public function testPhotoSizeIsTooLarge()
    {
        //the expected value is validation fails
        $expected = True;

        $rules = array(
            'caption' => ['string','nullable'],
            'photo'   => ['required','mimes:png,jpg,jpeg','max:9048'],
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'caption' => null,
            'photo' => UploadedFile::fake()->image('avatar.jpg')->size(9049)
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    
}
