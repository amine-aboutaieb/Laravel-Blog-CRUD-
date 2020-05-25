@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <small>{{$post->create_at}}</small>
                    </div>
                </div>
                @include('inc.updateAndDel')
            @endforeach
        </div>
    </div>
</div>
@endsection
