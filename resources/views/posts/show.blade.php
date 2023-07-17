@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @can('update', $post)<div class="mb-3 d-flex">
            <a href="/p/{{$post->id}}/edit" class="btn btn-primary mr-2">Edit post</a>
            <form method="post" action="/p/{{$post->id}}"> 
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div> @endcan
        <div class="mb-3"><img  src="/storage/{{ $post->image }}" alt="post image" style="max-width:600px;max-height:424px;object-fit:cover;"></div>
        <like-button class="mb-3" post-id="{{$post->id}}" likes="{{$likes}}" likecount="{{$post->liked->count()}}"></like-button>
        <h2>{{$post->title}}</h2>
        <div>{{$post->text}}</div>
        <div class="d-flex flex-row-reverse mt-4"><a class="text-dark" href="/u/{{$post->user->id}}">{{$post->user->username}}</a></div>
    </div>
</div>
@endsection