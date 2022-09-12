<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        try{
            $facebookUser = Socialite::driver('facebook')->user();
            //dd($facebookUser);
            $isUser = User::where('fb_id', $facebookUser->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('/')->with('message', 'Your are login ');
            }else{
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'fb_id' => $facebookUser->id,
                    'password' => encrypt('password123'),
                ]);
                Auth::login($newUser);
                return redirect('/')->with('message', 'You are log in');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}


