@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        {!! Form::open(['action'=>['PostsController@update',$post->id], 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{ Form::text('title',$post->title,['class'=>'form-control','autocomplete'=>'off']) }}
                {{Form::label('body','Body')}}
                {{ Form::text('body',$post->body,['class'=>'form-control','autocomplete'=>'off']) }}
                {{Form::hidden('_method','PUT')}}
            </div>
            {{Form::submit('Edit')}}
        {!! Form::close() !!}
    </div>
@endsection


