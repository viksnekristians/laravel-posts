<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
public function __construct() {
    $this->middleware('auth'); // lauj pieklut tikai ja ir loginots
}

    public function posts()
    {
        //$posts = Post::paginate(5);
        $users = auth()->user()->following->pluck('id')->toArray();
        $users= array_merge($users, [auth()->user()->id]);
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        return view('posts/index', [
            'posts' => $posts,
            'users' => $users
        ]);
    }


    public function create() {
        return view('posts/create');
    }

    public function store() {
        $data = request()->validate([
        'title' =>'required',
        'text' => 'required',
        'image' => ['required', 'image']]);   

        
        $img = request()->file('image');  
        $hashname = $img->hashName();
        $imageArray = ['image' => $hashname];
        Storage::disk('public')->put('', $img);
        auth()->user()->posts()->create(array_merge($data, $imageArray));
        //Post::create($data);
        return redirect('/posts');  
    }

    public function show(\App\Models\Post $post) {
        $likes = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;
        return view('posts/show' ,compact('post', 'likes'));
    }

    public function edit(\App\Models\Post $post) {
        $this->authorize('update', $post);
        return view('/posts/edit', compact('post'));
    }

    public function delete(\App\Models\Post $post) {
        $this->authorize('update', $post);
        $img = $post->image;
        if ($img) Storage::disk('public')->delete($img);
        $post->delete();
        return redirect('/');
    }

    public function update(\App\Models\Post $post) {
        $this->authorize('update', $post);
        $data = request()->validate([
            'title' =>'required',
            'text' => 'required']); 
        $img = request()->file('image'); 
        if ($img) {
            $hashname = $img->hashName();
            $imageArray = ['image' => $hashname];
            Storage::disk('public')->put('', $img);
            $post->update(array_merge($data, $imageArray));
        }
        else {
            $post->update($data);
        }

        return redirect('p/'.$post->id );
    }
 }

