@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    {{-- with pagination --}}
    <h1>Posts</h1>
    @if(count($posts) > 0)
        <div class="pt-3 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
        @foreach($posts as $post)
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
        {{-- pagination --}}
        <div class="pt-3 d-flex justify-content-center">
        {{$posts->links()}}
        </div>
    @else
        <p>No posts found</p>
    @endif
@endsection