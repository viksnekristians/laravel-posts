@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Newest posts</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><a class="btn btn-success mb-5" href="/p/create">Add new post</a></div>
                    <div class="pt-3 d-flex justify-content-center">{{$posts->links()}}</div>
                    @foreach($posts as $post)
                    <div class="border-bottom border-2 pb-3">
                        <a href="/p/{{ $post->id }}" class="text-dark" style="">
                            <div class="user-post py-2 d-flex flex-row align-items-stretch">
                                <div class="mr-3">
                                    <img class="mb-2" src="/storage/{{ $post->image }}" alt="post image" style="width:150px;height:150px;object-fit:cover;">
                                </div>
                                <div class="w-100 d-flex flex-column justify-content-space-between">
                                    <div class="mb-4">
                                        <h3>{{ $post->title ?? 'N/A' }}</h3>
                                        <div class="post-list-text">{{ $post->text ?? 'N/A' }}</div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-auto">
                                        <a href="/u/{{$post->user->id}}" class="user-link text-dark">Author:{{$post->user->name}}</a>
                                    </div>
                                </div>
                            </div>     
                        </a>
                        <like-button post-id="{{$post->id}}" likes="{{auth()->user()->likes->contains($post->id)}}" likecount="{{$post->liked->count()}}"></like-button> 
                    </div>             
                    @endforeach
                    <div class="pt-3 d-flex justify-content-center">{{$posts->links()}}</div>
                        
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection