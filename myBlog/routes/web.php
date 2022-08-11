<?php

#use GuzzleHttp\Psr7\Request;

use App\Models\Blogging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blogs;

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

Route::get('/', function () {
    return view('blogs', [
        'heading' => 'Latest Blogs',
        'blogs' => Blogs::all()
    ]);
});
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

Route::get('/blogs/{id}' , function($id){
    return view('blog', [
        'blog' => Blogs::find($id)
    ]);
});