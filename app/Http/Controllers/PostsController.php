<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
public function __construct() {
    $this->middleware('auth'); // lauj pieklut tikai ja ir loginots
}

    public function posts()
    {
        $posts = Post::paginate(5);
        return view('posts/index', [
            'posts' => $posts
        ]);
    }


    public function create() {
        return view('posts/create');
    }

    public function store() {
        $data = request()->validate([
        'title' =>'required',
        'text' => 'required']);   
        auth()->user()->posts()->create($data);

       // \App\Models\Post::create($data);
        return redirect('/posts'); 
    }

    public function show(\App\Models\Post $post) {
        
        return view('posts/show' ,compact('post'));
    }

    public function edit(\App\Models\Post $post) {
        $this->authorize('update', $post);
        return view('/posts/edit', compact('post'));
    }

    public function update(\App\Models\Post $post) {
        $this->authorize('update', $post);
        $data = request()->validate([
            'title' =>'required',
            'text' => 'required']); 
    
        $post->update($data);

        return redirect('p/'.$post->id );
    }
 }

