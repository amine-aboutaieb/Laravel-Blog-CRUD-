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
    </div>
@endsection