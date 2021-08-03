@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @can('update', $post)<div><a href="/p/{{$post->id}}/edit" class="btn btn-primary">Edit post</a></div> @endcan
        <h2>{{$post->title}}</h2>
        <div>{{$post->text}}</div>
        <div>{{$post->user->username}}</div>
    </div>
</div>
@endsection