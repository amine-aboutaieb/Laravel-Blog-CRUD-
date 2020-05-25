{!! Form::open(['action'=>['CommentsController@addComment',$post->id], 'method'=>'POST']) !!}
    <div class="my-5">
        {{ Form::text('comment_field','',['placeholder'=>'Comment...','autocomplete'=>'off']) }}
        {{Form::submit('Comment')}}
    </div>
{!! Form::close() !!}