@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    {{-- with pagination --}}
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
            </div>
        @endforeach
        {{-- pagination --}}
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection