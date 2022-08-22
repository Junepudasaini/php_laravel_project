<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BloggingController extends Controller
{
    public function index() {
        return view('blogs.index', [
            'blogs' => Blogs::latest()->filter(request(['tag', 'search']))->paginate(4)
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
        #dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'name' => ['required', Rule::unique('blogs', 'name')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Blogs::create($formFields);

        return redirect('/')->with('successMessage', 'Your blog created successfully!');
    }
    // Edit Form
    public function edit(Blogs $blog){
        
        return view('blogs.edit', ['blogging' => $blog]);
    }
    public function update(Request $request, Blogs $blog){
        #dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'name' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $blog->update($formFields);

        return back()->with('message', 'Your blog updated successfully!');
    }
    //Delete Blog
    public function delete(Blogs $blog){
        $blog->delete();
        return redirect('/')->with('message', 'Deleted Blog');
    }

}
