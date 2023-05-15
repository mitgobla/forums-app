@extends('layouts.app')

@section('title', 'Community')

@section('content')
    <div class="card">
        @if($community->image_path)
            <img src="{{ asset('images/' . $community->image) }}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:50rem">
        @endif
        <div class="card-body">
            <h3 class="card-title">{{$community->name}}</h3>
            <h6 class="card-subtitle mb-2 text-muted">Created on {{$community->created_at}}</h6>
            <hr>
            <p class="card-text">{{$community->description}}</p>
        </div>
    </div>

    {{-- users --}}
    @foreach ($community->users as $user)
        <div class="card flex-row flex-wrap p-2 mt-1">
            @if($user->profilePicture)
                <img src="{{ $user->profilePicture->path }}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:5rem">
            @endif
            <div class="card-body">
                <h3 class="card-title"><a href="/users/{{$user->id}}">{{$user->name}}</a></h3>
            </div>
            <div class="card-footer w-100 text-muted">
                <span class="bi bi-layout-text-window"></span>
                <small>{{count($user->posts)}}</small>
                <div class="d-inline-block mx-2"></div>
                <span class="bi bi-chat-dots"></span>
                <small>{{count($user->comments)}}</small>
            </div>
        </div>
    @endforeach
@endsection
