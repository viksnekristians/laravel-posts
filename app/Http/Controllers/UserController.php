<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // lauj pieklut tikai ja ir loginots
    }

    public function show(\App\Models\User $user) {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
       
       /* $val = Cache::get('value');
        if ($val) {
            $value=$val;
        } else {
            $value = "vel nav";
        }
        Cache::put('value','ir', 15);*/
        return view('users/show' ,compact('user', 'follows'));
    }

    public function edit(\App\Models\User $user) {
        if ($user->id !== auth()->user()->id) return redirect('/');
        return view('users/edit' ,compact('user'));
    }

    public function update(\App\Models\User $user) {
        $this->authorize('update', $user);
        $data = request()->validate([
            'name' =>'required',
            'email' => 'required',
            'username' => 'required']); 
        $img = request()->file('image');
        if ($img) {
            $hashname = $img->hashName();
            $imageArray = ['image' => $hashname];
            Storage::disk('public')->put('', $img);
            $user->update(array_merge($data, $imageArray));
        }
        else {
            $user->update($data);
        }

        return redirect("u/".$user->id);
    }
}
