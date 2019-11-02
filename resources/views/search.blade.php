@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="threads">
        <div class="container">
            <div class="list">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $searchTerm }}</li>
                    </ol>
                </nav>

                @foreach($search as $thread)
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection