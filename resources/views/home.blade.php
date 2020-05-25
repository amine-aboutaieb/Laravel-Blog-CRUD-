@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card my-5 px-5 pt-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$post->title}}</h3>
                            <p>{{$post->body}}</p>
                            <small>{{$post->created_at}}</small>
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
            @endforeach
        </div>
    </div>
</div>
@endsection
