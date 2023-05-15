@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="card">
        @if($post->image_path)
            <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:50rem">
        @endif
        <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></h6>
            <hr>
            <p ckass="card-text">{{$post->body}}</p>
        </div>
    </div>

    {{-- add comment box --}}
    @if(Auth::check())
        @if(auth()->user()->can('create any comment'))
            <hr>
            <h3>Add Comment</h3>
            <form id="comment-form">
                @csrf
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <div class="alert alert-danger" role="alert">
                <span class="bi bi-exclamation-triangle-fill" style="font-size: 1.5em;"></span>
                You do not have permission to add comments.
            </div>
        @endif
    @else
        <div class="alert alert-danger" role="alert">
            <span class="bi bi-exclamation-triangle-fill" style="font-size: 1.5em;"></span>
            You must be logged in to add comments.
        </div>
    @endif

    {{-- list of comments --}}
    <div id="comments-container">
    @if(count($post->comments) > 0)
        <h3>Comments</h3>
        @foreach($post->comments->reverse() as $comment)
            <div class="card p-2">
                <h6 class="card-subtitle mb-2 text-muted">Written on {{$comment->created_at->diffForHumans()}} by <a href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a></h6>
                <p class="card-text">{{$comment->body}}</p>
                {{-- edit and delete buttons --}}
                @if(!Auth::guest())
                    @if(auth()->user()->can('update any comment') || auth()->user()->id == $comment->user_id)
                        <form action="/comments/{{$comment->id}}/edit" method="GET" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    @endif
                    @if(auth()->user()->can('delete any comment') || auth()->user()->id == $comment->user_id)
                        <form action="/comments/{{$comment->id}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
    @else
        <p>No comments found</p>
    @endif
@endsection

@push('bodyScripts')
    @vite('resources/js/comment.js')
@endpush
