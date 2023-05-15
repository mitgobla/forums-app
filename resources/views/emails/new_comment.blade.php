@extends('layouts.app')

@section('title', 'New Comment')

@section('content')
    {{-- card --}}
    <div class="card">
        <div class="card-body">
            <h3>New Comment</h3>
            <h6>on <a href="/posts/{{$post->id}}">{{$post->title}}</a></h6>

            <hr>
            <p class="card-text">{{$comment->body}}</p>
            <div class="card-footer w-100 text-muted">
                <small>Written {{$comment->created_at->diffForHumans()}} by <a href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a></small>
            </div>
        </div>
    </div>
@endsection