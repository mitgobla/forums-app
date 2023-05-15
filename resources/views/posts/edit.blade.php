@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    {{-- form --}}
    <h1>Create Post</h1>

    <form id="post-form" action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group p-2">
            <label for="title">Title</label>
            {{-- put the post text in --}}

            <input class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group p-2">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
        </div>
        <div class="form-group p-2">
            @if ($post->image_path)
                <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top rounded mx-auto" alt="..."
                    style="max-width:5rem">
                {{-- checkbox to remove image --}}
                <label for="remove_image">Remove Image</label>
                <input type="checkbox" id="remove_image" name="remove_image" value="0">
            @endif
        </div>
        <div class="form-group p-2">

            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary p-2">Submit</button>
    </form>
@endsection
