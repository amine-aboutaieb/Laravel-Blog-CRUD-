@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title">{{$user->name}}</h3>
                <small>{{$user->email}}</small>
            </div>
        </div>
        <h3>Posts</h3>
        @foreach ($user->posts as $post)
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>{{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection