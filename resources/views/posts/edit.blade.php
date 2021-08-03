@extends('layouts.app')

@section('content')
<div class="container">
<form action="/p/{{$post->id}}" method="post">
@csrf
@method('PATCH')
       
            <label for="title" >{{ __('Title:') }}</label>

            <div class="">
                <input id="title" type="text" class="mb-2 form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <label for="text" >{{ __('Text:') }}</label>

            <div class="">
                <textarea id="text" class="mb-2 form-control @error('text') is-invalid @enderror" rows="15" name="text" autocomplete="text" autofocus>{{ old('text') ?? $post->text }}"</textarea>

                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class=""><button class="btn btn-primary">Edit post</button></div>
    </form>
</div>
@endsection