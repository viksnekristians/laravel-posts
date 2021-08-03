@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <h2>{{$user->username}}</h2>    
            <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
        </div>
        <h6>{{$user->name}}</h6>
        <div class="d-flex">
            <p class="mr-3">Following: <b>{{$user->following->count()}}</b></p>
            <p>Followers: <b>{{$user->followers->count()}}</b></p> 
        </div>
        <hr>
        <h3 class="mb-3"><strong>{{$user->username}} posts:</strong></h3>
        @foreach($user->posts as $post)
        <a href="/p/{{ $post->id }}" class="text-dark" style="">
                    <div class="user-post p-3 border-bottom border-2">
                        <h3>{{ $post->title ?? 'N/A' }}</h3>
                        <div>{{ $post->text ?? 'N/A' }}</div>
                        <div class="d-flex flex-row-reverse"><a href="/u/{{$post->user->id}}" class="user-link text-dark">Author:{{$post->user->name}}</a></div>
                    </div>     
                    </a>              
        @endforeach
    </div>
</div>
@endsection