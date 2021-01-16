<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $user=User::where("email",$request->email)->first();
        if(!$user){
            return abort(401);
        }
        if(!Hash::check($request->password,$user->password)){
            return abort(401);
        }
        Auth::login($user);
        return redirect()->route("home");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

    public function register(Request $request){
        $request->validate([
            "name"=>["required","string","min:5","max:30"],
            "email"=>["required","email"],
            "password"=>["required","min:5","max:15","confirmed"],
        ]);

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);

        return redirect()->route('login');
    }
}
