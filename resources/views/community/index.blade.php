@extends('layouts.app')

@section('title', 'Communities')

@section('content')
    {{-- with pagination --}}
    <h1>Communities</h1>
    @if(count($communities) > 0)
        <div class="pt-3 d-flex justify-content-center">
            {{$communities->links()}}
        </div>
        @foreach($communities as $community)
            <div class="card flex-row flex-wrap p-2 mt-1">
                @if($community->image)
                    <img src="{{$community->image}}" class="card-img-top rounded mx-auto d-block" alt="..." style="max-width:5rem">
                @endif
                <div class="card-body">
                    <h3 class="card-title"><a href="/community/{{$community->id}}">{{$community->name}}</a></h3>
                    <h6 class="card-subtitle mb-2 text-muted">Created on {{$community->created_at}}</h6>
                </div>
                <div class="card-footer w-100 text-muted">
                    <span class="bi bi-people-fill"></span>
                    <small>{{count($community->users)}}</small>
                </div>
            </div>
        @endforeach
        {{-- pagination --}}
        <div class="pt-3 d-flex justify-content-center">
        {{$communities->links()}}
        </div>
    @else
        <p>No communities found</p>
    @endif
@endsection