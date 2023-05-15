@extends('layouts.app')

@section('title', 'Edit Community')

@section('content')
    {{-- form --}}
    <h1>Edit Post</h1>

    <form id="post-form" action="{{ route('community.update', $community) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group p-2">
            <label for="Name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $community->title }}">
        </div>
        <div class="form-group p-2">
            <label for="slug">Slug</label>
            <input class="form-control" id="slug" name="slug" value="{{ $community->slug }}">
        </div>
        <div class="form-group p-2">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $community->description }}</textarea>
        </div>
        <div class="form-group p-2">
            @if ($post->image_path)
                <img src="{{ asset('images/' . $community->image) }}" class="card-img-top rounded mx-auto" alt="..."
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
