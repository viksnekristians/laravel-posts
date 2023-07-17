@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf
       
            <label for="title" >{{ __('Title:') }}</label>

            <div class="">
                <input required id="title" type="text" class="mb-2 form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <label for="text" >{{ __('Text:') }}</label>

            <div class="">
                <textarea required id="text" class="mb-2 form-control @error('text') is-invalid @enderror" rows="15" name="text" value="{{ old('text') }}" autocomplete="text" autofocus></textarea>

                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="image" >Image:</label>

            <div class="mb-2">
            <input type="file" id="image" name="image" accept="image/*" required>
            </div>

        <div class=""><button class="btn btn-primary">Add new post</button></div>
    </form>
</div>
@endsection