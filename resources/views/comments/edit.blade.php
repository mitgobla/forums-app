@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
    {{-- form --}}
    <h1>Edit Comment</h1>

    <form id="post-form" action="{{ route('comment.update', $comment) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group p-2">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{ $comment->body }}</textarea>
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary p-2">Submit</button>
    </form>
@endsection
