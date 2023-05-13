@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="well">
        <h3>{{$post->title}}</h3>
        <small>Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
        <hr>
        <p>{{$post->body}}</p>

    {{-- list of comments --}}
    @if(count($post->comments) > 0)
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <div class="card">
                <h5 class="card-title">{{$comment->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Written on {{$comment->created_at}} by <a href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a></h6>
                <p class="card-text">{{$comment->body}}</p>
            </div>
        @endforeach
    @else
        <p>No comments found</p>
    @endif
@endsection
