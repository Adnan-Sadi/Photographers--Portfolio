<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Rules\Email;
require '../vendor/autoload.php';
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function Login()
    {
        $auth = "";
        return view('home.login', ["auth" => $auth]);
    }

    public function Mahin()
    {
        return view('home.mahinigga');
    }


    public function Registration()
    {
        return view('home.registration');
    }

    public function Register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required|min:4|unique:users|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:confirmpass',
            'confirmpass' => 'required'
        ]);
        
        if ($validator->fails()) {
            //return view('home.registration', ["ch" => $ch]);
            return redirect()->route('home.registration')->with('errors',$validator->errors())->withInput();
        }else{
            $user = new User();
            $user->username                       = $req->username;
            $user->full_name                       = $req->full_name;
            $user->email                        = $req->email;
            $user->created_at                = Carbon::now();
            $user->updated_at                = Carbon::now();
            $user->password                 = $req->password;


        if ($user->save()){
            return redirect()->route('home.login');
        }
        else{
            echo "Server Error";
        }
    }  
}
    public function ValidateLogin(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect()->route('home.login')->with('errors',$validator->errors())->withInput();
        } else {

            $auth = "";
            $user  = User::where('email', $req->email)
                            ->where('password', $req->password)
                            ->first();

            if($user)
            {
                $req->session()->put('u_id', $user->u_id);
                $req->session()->put('email', $user->email);
                $req->session()->put('username', $user->username);

                return redirect()->route('home.mahinigga');
            }
            else{
                $auth = "Unauthorized";
                return view('home.login', ["auth" => $auth]);
            }
        }
    }


    public function Logout(Request $req){
    	$req->session()->flush();
    	return redirect()->route('home.login');
    }
}
