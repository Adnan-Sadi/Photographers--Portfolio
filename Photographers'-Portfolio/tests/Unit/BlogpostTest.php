<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use File;

use Illuminate\Foundation\Testing\WithFaker;

class BlogpostTest extends TestCase
{
    /**
     * Tests that the route to the blogpost page exists.
     * 
     */
    public function testRouteForBlogpostPageExists()
    {
        $response = $this->get('/blogpost');   
        $response->assertStatus(200);
    }

    /**
     * Tests what happens when both title, text_writings and cover_photo exists inside form request.
     * The expected result is that the validation result does not fail.
     */
    public function testTitleTextWritingAndCoverPhotoExists()
    {
        //expected value is validation does not fail
        $expected = true;
        
        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => 'test title',
            'text_writings' => 'test writings for the text writings section',
            'cover-photo' => UploadedFile::fake()->image('avatar.png')
        ]);

        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when title, text writings and cover photo all exists inside form request.
     * The expected result is that the validation result will fail.
     */
    public function testTitleTextWritingsAndCoverPhotoIsNull()
    {
        //expected value is validation does not fail
        $expected = True;
        
        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => null,
            'text_writings' => null,
            'cover_photo' => null
        ]);

        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when title is null but text writings and cover photo exists inside form request.
     * The expected result is that the validation result fails.
     */
    public function testTitleIsNullButTextAndCoverPhotoExists()
    {
        //the expected value is validation fails
        $expected = true;

        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => null,
            'text_writings' => 'test writings for the text writings section',
            'cover_photo' => UploadedFile::fake()->image('avatar.jpeg')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }


    /**
     * Tests what happens when title and text writing are null but cover photo exists inside form request.
     * The expected result is that the validation result fails.
     */
    public function testTitleAndTextWritingAreNullButCoverPhotoExists()
    {
        //the expected value is validation fails
        $expected = true;

        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => null,
            'text_writings' => null,
            'cover_photo' => UploadedFile::fake()->image('avatar.jpeg')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when title and text writings exist but cover photo is null inside form request.
     * The expected result is that the validation result fails.
     */
    public function testTitleAndTextWritingsIsNullButCoverPhotoExists()
    {
        //the expected value is validation fails
        $expected = true;

        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => 'test title',
            'text_writings' => 'test writings for the text writings section',
            'cover_photo' => null
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the cover photo is of type jpg/png/jpeg.
     * The expected result is that the validation result does not fail.
     */
    public function testCoverPhotoIsOfTypePngOrJpgOrJpeg()
    {
        //the expected value is validation does not fail
        $expected = true;

        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => 'test title',
            'text_writings' => 'test writings for the text writings section',
            'cover_photo' => UploadedFile::fake()->image('avatar.png')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }

    /**
     * Tests what happens when the cover photo is not of type jpg/png/jpeg.
     * The expected result is that the validation result will fail.
     */
    public function testCoverPhotoIsNotOfTypePngOrJpgOrJpeg()
    {
        //the expected value is validation fails
        $expected = true;

        $rules = array(
            'title '=> ['string','required'],
            'text_writings' => ['string', 'required'],
            'cover_photo' => ['required','mimes:jpg,png,jpeg','max:5048']
        );

        Storage::fake('avatars');
        
        $request = new Request([
            'title' => 'test title',
            'text_writings' => 'test writings for the text writings section',
            'cover_photo' => UploadedFile::fake()->image('avatar.gif')
        ]);
        
        //checking validation rules against all variables in $request
        $validates = Validator::make($request->all(), $rules);

        $this->assertEquals($expected,$validates->fails());
    }
}
