<?php

#use GuzzleHttp\Psr7\Request;

use App\Http\Controllers\BloggingController;
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

Route::get('/', [BloggingController::class, 'index']);

Route::get('/blogs/create', [BloggingController::class, 'create']);

Route::post('/blogs', [BloggingController::class, 'store']);

Route::get('/blogs/{blogging}', [BloggingController::class, 'show']);









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