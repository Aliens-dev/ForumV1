@extends('layouts.app')

    @section('content')

        @include('layouts.navbar')

        <div class="forums">
            <div class="container">
                @if( session()->has('success') )
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session()->get('success') }}
                        <button class="close" role="button"  data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @can('add',App\Forum::class)
                    <a class="btn btn-primary" href="{{ route('forum.add') }}">
                        Add new Forum
                    </a>
                @endcan
                <div class="list">
                    @if(isset($forums) && count($forums) > 0)
                        @foreach($forums as $forum)
                            <?php
                                dd($forum);
                            ?>
                            <div class="item">
                                <div class="forum-name">
                                <span class="title">
                                    <i class="fa fa-edit"></i>
                                    <a href="{{route('forum.index',$forum->id)}}">{{$forum->name}}</a>
                                </span>
                                    <span class="description">
                                    {{$forum->description}}
                                </span>
                                </div>
                                <div class="forum-info">
                                    <span class="threads">{{$forum->threads->count()}} Threads</span>
                                    <span class="replies">{{$forum->replies->count()}}  replies</span>
                                </div>
                                <div class="latest-thread">
                                <span class="profile">
                                    <img src="http://unsplash.it/200/200">
                                </span>
                                    <div class="thread-name">
                                        <span class="title">{{$forum->threads->sortBy('created_at')->first()['title']}}</span>
                                        <span class="post-time">{{ \Carbon\Carbon::parse($forum->threads->sortBy('created_at')->first()['created_at'])->toDateTimeString() }}</span>
                                    </div>
                                </div>
                                @can('delete',$forum)
                                    <div class="dropdown deletebtn">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="{{$forum->id}}"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                                        <div class="dropdown-menu" aria-labelledby="{{$forum->id}}">
                                            <a class="dropdown-item" href="{{route('forum.edit',$forum->id)}}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('forum.delete',$forum->id) }}">Delete</a>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>

        @endsection