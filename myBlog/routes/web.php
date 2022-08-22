<?php

#use GuzzleHttp\Psr7\Request;

use App\Models\Blogs;
use App\Models\Blogging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BloggingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ALl Blogs
Route::get('/', [BloggingController::class, 'index']);

//Create
Route::get('/blogs/create', [BloggingController::class, 'create'])->middleware('auth');

Route::post('/blogs', [BloggingController::class, 'store'])->middleware('auth');

Route::get('/blogs/{blogging}', [BloggingController::class, 'show']);

// Edit
Route::get('/blogs/{blog}/edit', [BloggingController::class, 'edit'])->middleware('auth');

// Update
Route::put('/blogs/{blog}', [BloggingController::class, 'update'])->middleware('auth');

// Delete
Route::delete('/blogs/{blog}', [BloggingController::class, 'delete'])->middleware('auth');

// Register Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);




/*
Route::get('/', function () {
    return view('blogs', [
        #'heading' => 'Latest Blogs',
        'blogs' => Blogs::all()
    ]);
});
*/
/*
Route::get('/hello', function() {
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    return($request->name . ' ' . $request->city);
});
*/
/*
Route::get('/blogs/{id}' , function($id){
    $blogging = Blogs::find($id);

    if($blogging) {
        return view('blog', [
            'blog' => $blogging
        ]);
    } else{
        abort('404');
    }
});

Route::get('/blogs/{blogging}' , function(Blogs $blogging){
    return view('blog', [
        'blog' => $blogging
    ]);
});
*/