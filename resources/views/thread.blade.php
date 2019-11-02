@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="user-thread">
        <div class="container">
            <div class="thread">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('forum.index',$thread->forum->id) }}">{{ $thread->forum->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $thread->title }}</li>
                    </ol>
                </nav>
                <div class="thread-title">
                    {{ $thread->title }}
                </div>
                <div class="thread-post">
                    <div class="profile">
                        <span class="profile-img">
                            <img src="http://unsplash.it/200/200" />
                        </span>
                        <span class="profile-username">#{{ $thread->user->username }}</span>
                        <span class="profile-joined">{{ $thread->user->created_at }}</span>
                    </div>
                    <div class="content">
                        {!! $thread->content !!}
                        @can('delete',$thread)
                            <div class="dropdown deletebtn">
                                <a class="btn dropdown-toggle" href="#" role="button" id="{{$thread->id}}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                                <div class="dropdown-menu" aria-labelledby="{{$thread->id}}">
                                    <a class="dropdown-item" href="{{route('thread.edit',$thread->id)}}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('thread.delete',$thread->id) }}">Delete</a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
                @foreach($thread->replies as $reply)
                        <div class="thread-reply">
                            <div class="profile">
                                <span class="profile-img">
                                    <img src="http://unsplash.it/200/200" />
                                </span>
                                <span class="profile-username">#{{ $reply->user->username }}</span>
                                <span class="profile-joined">{{ $reply->user->created_at }}</span>
                            </div>
                            <div class="content">
                                {!! $reply->content !!}
                            </div>
                            <div class="dropdown deletebtn">
                                <a class="btn dropdown-toggle" href="#" role="button" id="{{$reply->id}}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                                <div class="dropdown-menu" aria-labelledby="{{$reply->id}}">
                                    <a class="dropdown-item" href="{{route('reply.edit',[$reply->thread_id,$reply->id])}}">Edit</a>
                                    <a class="dropdown-item" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @auth
                    <div id="add-reply"></div>
                    @endauth
                @guest
                    <div class="">
                        You must <a href="{{route('user.login.get')}}">login</a> to reply!
                    </div>
                @endguest
            </div>
        </div>
    </div>

@endsection