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
        <div class="col-md-8">
            @foreach ($user->posts as $post)
            <div class="card my-5 px-5 pt-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>{{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
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
            @endforeach
        </div>
    </div>
@endsection