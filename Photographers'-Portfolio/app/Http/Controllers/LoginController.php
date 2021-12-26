<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Rules\Email;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function Login()
    {
        $auth = "";
        return view('auth.login', ["auth" => $auth]);
    }

    public function Marin()
    {
        return view('auth.machining');
    }


    public function Registration()
    {
        return view('auth.registration');
    }

    public function Register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required|min:4|unique:users|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:confirms',
            'confirms' => 'required'
        ]);

        if ($validator->fails()) {
            //return view('auth.registration', ["ch" => $ch]);
            return redirect()->route('auth.registration')->with('errors',$validator->errors())->withInput();
        }else{
            $user = new User();
            $user->username                       = $req->username;
            $user->full_name                       = $req->full_name;
            $user->email                        = $req->email;
            $user->created_at                = Carbon::now();
            $user->updated_at                = Carbon::now();
            $user->password                 = $req->password;


        if ($user->save()){
            return redirect()->route('auth.login');
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
            return redirect()->route('auth.login')->with('errors',$validator->errors())->withInput();
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

                return redirect()->route('Profile');
            }
            else{
                $auth = "Unauthorized";
                return view('auth.login', ["auth" => $auth]);
            }
        }
    }


    public function Logout(Request $req){
    	$req->session()->flush();
    	return redirect()->route('auth.login');
    }
}
