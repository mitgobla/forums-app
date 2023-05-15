@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="card-body">
                @if ($user->profilePicture)
                    <img src="{{ $user->profilePicture->path }}" class="card-img-top rounded mx-auto d-block" alt="..."
                        style="max-width:10rem">
                @endif
                <h1 class="card-title">{{ $user->name }}</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
            </div>
            <div class="card-footer w-100 text-muted">
                <span class="bi bi-layout-text-window"></span>
                <small>Posts: {{ count($user->posts) }}</small>
                <div class="d-inline-block mx-2"></div>
                <span class="bi bi-chat-dots"></span>
                <small>Comments: {{ count($user->comments) }}</small>
                <div class="d-inline-block mx-2"></div>
                <span class="bi bi-hammer"></span>
                <small>Roles: {{ $user->roles->pluck('name')->implode(', ') }}</small>
                <div class="d-inline-block mx-2"></div>
                <span class="bi bi-clouds"></span>
                <small>Weather: {{ $weather['current']['condition']['text'] }}</small>
            </div>
        </div>

        <div class="p-3">
            {{-- with pagination --}}
            <h1>Your Posts</h1>
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="card flex-row flex-wrap p-2 mt-1">
                        @if ($post->image_path)
                            <img src="{{ asset('images/' . $post->image_path) }}"
                                class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:5rem">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                            <h6 class="card-subtitle mb-2 text-muted">Written on {{ $post->created_at }}</h6>
                        </div>
                        <div class="card-footer w-100 text-muted">
                            <span class="bi bi-chat-dots"></span>
                            <small>{{ count($post->comments) }}</small>
                        </div>
                    </div>
                @endforeach
                {{-- pagination --}}
                <div class="pt-3 d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            @else
                <p>No posts found</p>
            @endif
            {{-- line --}}
            <hr class="my-4">
            {{-- with pagination --}}
            <h1>Your Comments</h1>
            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    @include('comments.partials.comment_card', ['comment' => $comment])
                @endforeach
                <div class="pt-3 d-flex justify-content-center">
                    {{ $comments->links() }}
                </div>
            @else
                <p>No comments found</p>
            @endif
        </div>
    </div>
@endsection
