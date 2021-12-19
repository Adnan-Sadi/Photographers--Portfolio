<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display the view of an individual photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('photopage');
    }
}
