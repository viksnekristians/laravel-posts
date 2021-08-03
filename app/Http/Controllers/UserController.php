<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // lauj pieklut tikai ja ir loginots
    }

    public function show(\App\Models\User $user) {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //dd($follows);

        return view('users/show' ,compact('user', 'follows'));
    }
}
