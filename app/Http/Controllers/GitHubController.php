<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirectToGitHub(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
        try{
            $githubUser = Socialite::driver('github')->user();
            //dd($githubUser);
            $isUser = User::where('github_id', $githubUser->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('/')->with('message', 'User already exist');
            }else{
                $user = User::create([
                    'github_id' => $githubUser->id,
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'password' => encrypt('passwordme')
                ]);
                Auth::login($user);
                return redirect('/')->with('message', 'Your account has been created successfully');
            }
        }catch(Exception $e){
          // dd($e->getMessage());
        }
    }
}
