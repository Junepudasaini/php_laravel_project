<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BloggingController extends Controller
{
    public function index() {
        return view('blogs.index', [
            'blogs' => Blogs::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    public function show(Blogs $blogging) {
        return view('blogs.show', [
            'blog' => $blogging
        ]);
    }

    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        #dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'name' => ['required', Rule::unique('blogs', 'name')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        Blogs::create($formFields);

        return redirect('/')->with('successMessage', 'Your blog created successfully!');
    }

}
