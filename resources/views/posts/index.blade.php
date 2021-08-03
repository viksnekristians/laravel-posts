@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><a class="btn btn-success mb-5" href="/p/create">Add new post</a></div>
                    <div class="pt-3 d-flex justify-content-center">{{$posts->links()}}</div>
                    @foreach($posts as $post)
                    <a href="/p/{{ $post->id }}" class="text-dark" style="">
                    <div class="user-post p-3 border-bottom border-2">
                        <h3>{{ $post->title ?? 'N/A' }}</h3>
                        <div>{{ $post->text ?? 'N/A' }}</div>
                        <div class="d-flex flex-row-reverse"><a href="/u/{{$post->user->id}}" class="user-link text-dark">Author:{{$post->user->name}}</a></div>
                    </div>     
                    </a>              
                    @endforeach
                    <div class="pt-3 d-flex justify-content-center">{{$posts->links()}}</div>
                        
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection