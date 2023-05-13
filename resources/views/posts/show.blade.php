@extends('layouts.app')

@section('title', 'Post')

@section('content')
    {{-- with pagination --}}
    <div class="well">
        <h3>{{$post->title}}</h3>
        <small>Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
        <hr>
        <p>{{$post->body}}</p>
@endsection