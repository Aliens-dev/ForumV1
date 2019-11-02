@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="thread-add mt-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('forum.index',$forum->id) }}">{{ $forum->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Thread</li>
                </ol>
            </nav>
            <div id="add-thread"></div>
        </div>
    </div>

@endsection