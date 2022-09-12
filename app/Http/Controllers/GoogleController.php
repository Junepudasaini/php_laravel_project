<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $googleUser = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $googleUser->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('/')->with('message', 'User already exist');
            }else{
                $newUser = User::create([
                    'name' =>$googleUser->name,
                    'email' =>$googleUser->email,
                    'google_id' =>$googleUser->id,
                    'password' => encrypt('pasord')
                ]);
                Auth::login($newUser);
                return redirect('/')->with('message', 'Your account has been created successfully');

            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
