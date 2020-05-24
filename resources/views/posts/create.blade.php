@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Create Post</h1>
        {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{ Form::text('title','',['class'=>'form-control','autocomplete'=>'off']) }}
                {{Form::label('body','Body')}}
                {{ Form::text('body','',['class'=>'form-control','autocomplete'=>'off']) }}
            </div>
            {{Form::submit('Submit')}}
        {!! Form::close() !!}
    </div>
@endsection