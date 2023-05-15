@extends('layouts.app')

@section('title', 'Create Community')

@section('content')
    {{-- form --}}
    <h1>Create Community</h1>

    <form id="post-form" action="{{ route('community.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input class="form-control" id="slug" name="slug">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection