<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Create find() and findsearch() functions to receive and show data
 * on the search directory
 */

class SearchController extends Controller
{

public function find()
{
return view('search');
}
public function findSearch()
{
$search = get ( "search" );
$test =  User::where ( 'email', 'LIKE', '%' . $search . '%' )->orWhere ( 'full_name', 'LIKE', '%' . $search . '%' )->get ();

if (count ( $test ) > 0)
return view ('search')->withDetails ( $test )->withQuery ( $search );

else
return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
}
}
