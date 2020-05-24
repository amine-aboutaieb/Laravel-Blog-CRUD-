@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($users as $user)
            <div class="card my-2 w-50">
                <div class="card-body">
                    <p class="card-title"><a href="/users/{{$user->id}}">{{$user->name}}</a></p>
                    <small>{{$user->email}}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection