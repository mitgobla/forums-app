@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    {{-- form --}}
    <h1>Create Post</h1>

    <form id="post-form" action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection