@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="threads">
        <div class="container">
            <div class="list">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $forum->name }}</li>
                    </ol>
                </nav>
                @auth()
                    <div>
                        <a href="{{route('thread.add',$forum->id)}}" class="btn btn-primary">Add thread</a>
                    </div>
                @endauth
                @foreach($threads as $thread)
                    <div class="item">
                        <div class="thread-name">
                            <span class="title">
                                <i class="fa fa-edit"></i>
                                <a href="{{route('thread.index',$thread->id)}}">{{$thread->title}}</a>
                            </span>
                        </div>
                        <div class="thread-info">
                            <span class="threads">{{$thread->user->username}}</span>
                            <span class="threads">{{$thread->replies->count()}} replies</span>
                        </div>
                        <div class="latest-reply">
                            <span class="profile">
                                <img src="http://unsplash.it/200/200">
                            </span>
                            <div class="posted-time">
                                <span class="post-time">{{ \Carbon\Carbon::parse($thread->replies->sortBy('created_at')->first()['created_at'])->toDateTimeString() }}</span>
                            </div>

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
                @endforeach
            </div>
        </div>
    </div>

@endsection