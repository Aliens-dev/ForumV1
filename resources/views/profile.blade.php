@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="user-profile">
        <div class="container">
            <div class="profile">
                <div class="img">
                    <img src="http://placehold.it/200/200">
                </div>
                <div class="info">
                    <div class="item">{{$user->fname}} {{$user->lname}}</div>
                    <div class="item">{{$user->email}}</div>
                </div>
            </div>
            <div class="threads">
                @foreach($user->threads as $thread)
                    <div class="thread-card">
                        <a href="{{route('thread.index',$thread->id)}}">{{$thread->title}}</a>
                        <div class="dropdown deletebtn">
                            <a class="btn dropdown-toggle" href="#" role="button" id="{{$thread->id}}"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                            <div class="dropdown-menu" aria-labelledby="{{$thread->id}}">
                                <a class="dropdown-item" href="{{route('thread.edit',$thread->id)}}">Edit</a>
                                <a class="dropdown-item" href="{{ route('thread.delete',$thread->id) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

@endsection