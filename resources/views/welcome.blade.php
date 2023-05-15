@extends('layouts.app')

{{-- app name from config --}}
@section('title', config('app.name'))

@section('content')
    {{-- welcome page --}}
    <div class="jumbotron text-center">
        <h1>{{config('app.name')}}</h1>
        <p>Welcome to the forums about all things random.</p>
        @if(Auth::guest())
        <p>
            <a href="/login" class="btn btn-primary btn-lg">Login</a>
            <a href="/register" class="btn btn-success btn-lg">Register</a>
        </p>
        @endif
    </div>
    {{-- line --}}
    <hr class="my-4">
    {{-- recent posts --}}
    <h2>Recent Posts</h2>
    @foreach($recentPosts as $post)
    <div class="card flex-row flex-wrap p-2 mt-1">
        @if($post->image_path)
            <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:5rem">
        @endif
        <div class="card-body">
            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></h6>
        </div>
        <div class="card-footer w-100 text-muted">
            <span class="bi bi-chat-dots"></span>
            <small>{{count($post->comments)}}</small>
        </div>
    </div>
    @endforeach
    {{-- line --}}
    <hr class="my-4">
    {{-- top posts --}}
    <h2>Top Posts</h2>
    @foreach($mostCommentedPosts as $post)
    <div class="card flex-row flex-wrap p-2 mt-1">
        @if($post->image_path)
            <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:5rem">
        @endif
        <div class="card-body">
            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></h6>
        </div>
        <div class="card-footer w-100 text-muted">
            <span class="bi bi-chat-dots"></span>
            <small>{{count($post->comments)}}</small>
        </div>
    </div>
    @endforeach
@endsection