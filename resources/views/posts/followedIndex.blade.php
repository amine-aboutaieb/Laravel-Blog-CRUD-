
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @foreach ($users as $user)
            <div>
                @foreach ($user->posts as $post)
                    <div class="card my-2">
                        <div class="card-body">
                            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>{{$post->created_at}}</small>
                            <small>{{$post->user->name}}</small>
                        </div>
                    </div>
                    @include('inc.updateAndDel')
                @endforeach
                
            </div>
        @endforeach
    </div>
@endsection