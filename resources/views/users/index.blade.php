@extends('layouts.app')

@section('title', 'Users')

@section('content')
    {{-- with pagination --}}
    <h1>Users</h1>
    @if(count($users) > 0)
        <div class="pt-3 d-flex justify-content-center">
            {{$users->links()}}
        </div>
        @foreach($users as $user)
            <div class="card flex-row flex-wrap p-2 mt-1">
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
        {{-- pagination --}}
        <div class="pt-3 d-flex justify-content-center">
        {{$users->links()}}
        </div>
    @else
        <p>No users found</p>
    @endif
@endsection