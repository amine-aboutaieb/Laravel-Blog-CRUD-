@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$post->title}}</h3>
                <p>{{$post->body}}</p>
                <small>{{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        </div>
        @include('inc.updateAndDel')
        @include('inc.comment')
        @if (count($post->comments)>0)
            <div class="card my-4">
                <p class="card-header">Comments</p>
                @foreach ($post->comments as $comment)
                    <small class="mx-2 my-2"><strong>{{$comment->user->name}}</strong><i class="mx-2">{{$comment->body}}</i></small>
                @endforeach
            </div>
        @endif
    </div>
@endsection