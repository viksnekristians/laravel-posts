@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
    <div class="mb-5"><img  src="/storage/{{ $user->image }}" alt="user image" style="max-width:200px;max-height:200px;object-fit:cover; border-radius:5px;"></div>
        <div class="d-flex align-items-center mb-3">
            <h2 class="mb-0">{{$user->username}}</h2>    
            <follow-button v-show="{{$user->id}}!=={{auth()->user()->id}}" user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
            @can('update', $user)<a style="margin-left:10px;" class="btn btn-primary" href="/u/{{auth()->user()->id}}/edit">Edit profile</a>@endcan
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
                        <div class="user-post p-3 border-bottom border-2 d-flex flex-row align-items-stretch">
                            <div class="mr-3"><img  src="/storage/{{ $post->image }}" alt="post image" style="width:150px;height:150px;object-fit:cover;"></div>
                            <div class="w-100 d-flex flex-column justify-content-space-between">
                                <div class="mb-4">
                                    <h3>{{ $post->title ?? 'N/A' }}</h3>
                                    <div>{{ $post->text ?? 'N/A' }}</div>
                                </div>
                               
                            </div>
                        </div>     
                    </a>              
                    @endforeach
    </div>
</div>
@endsection