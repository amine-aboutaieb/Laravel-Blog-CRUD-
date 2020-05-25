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
            @if (Auth::check())
                @if (Auth::user()->id !== $user->id)

                    @foreach ( Auth::user()->follows as $follow)
                        @if ($follow->followed === $user->id)
                            @php
                                $exists = true;
                            @endphp
                        @endif
                    @endforeach

                    @if (isset($exists))
                        @if ($exists === true)
                            <a href="/unfollow/{{$user->id}}" class="btn btn-info">Unfollow</a>
                            @php
                                $exists = false;
                            @endphp
                        @else
                            <a href="/follow/{{$user->id}}" class="btn btn-primary">Follow</a>
                
                        @endif
                    @else
                        <a href="/follow/{{$user->id}}" class="btn btn-primary">Follow</a>
                    @endif


                @endif
            @endif
        @endforeach

    </div>
@endsection

