@if (Auth::check())
@if ($post->user->id === Auth::user('id')->id)
    <div class="d-flex flex-row-reverse">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-dark my-2 mx-2">Edit</a>
        {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST']) !!}
            {{Form::submit('Delete',['class'=>'btn btn-danger my-2 mx-2'])}}
            {{Form::hidden('_method','DELETE')}}
        {!! Form::close() !!}
    </div>
@endif
@endif