@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Edit Comment</h1>
        {!! Form::open(['action'=>['CommentsController@update',$comment->id], 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('body','Body')}}
                {{ Form::text('body',$comment->body,['class'=>'form-control','autocomplete'=>'off']) }}
            </div>
            {{Form::submit('Edit')}}
        {!! Form::close() !!}
    </div>
@endsection

