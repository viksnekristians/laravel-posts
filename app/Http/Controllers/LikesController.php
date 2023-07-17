<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(\App\Models\Post $post) {
        return [ auth()->user()->likes()->toggle($post), $post->liked()->count()];
    }
}
