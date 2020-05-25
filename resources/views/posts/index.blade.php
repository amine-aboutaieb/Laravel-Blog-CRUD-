
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card my-5 px-5 pt-5">
                    <div class="card my-2">
                        <div class="card-body">
                            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>{{$post->created_at}}</small>
                            <small>{{$post->user->name}}</small>
                        </div>
                    </div>
                    @include('inc.updateAndDel')
                    @include('inc.comment')

                    @if (count($post->comments)>0)
                    <div class="card my-4">
                        <p class="card-header">Comments</p>
                        @foreach ($post->comments as $comment)
                            <small class="mx-2 my-2">
                                <strong>{{$comment->user->name}}</strong><i class="mx-2">{{$comment->body}}</i>
                                @if (Auth::check())
                                    @if (Auth::user()->id === $comment->user->id)
                                        <a href="/comment/{{$comment->id}}/remove" class="btn btn-danger float-right mx-1">Remove</a>
                                        <a href="/comment/{{$comment->id}}/edit" class="btn btn-dark float-right mx-1">Edit</a>
                                    @endif
                                @endif
                            </small>
                        @endforeach
                    </div>
                    @endif
                </div>
            @endforeach
            
            {{$posts->links()}}

        </div>
    </div>
@endsection
