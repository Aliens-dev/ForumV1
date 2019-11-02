@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="forum-add mt-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Forum</li>
                </ol>
            </nav>
            <form class="add" action="{{route('forum.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Forum name">
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $msg)
                            <div class="alert alert-danger">
                                {{$msg}}
                            </div>
                            @endforeach
                        @endif
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Forum description"></textarea>
                    @if($errors->has('description'))
                        @foreach($errors->get('description') as $msg)
                            <div class="alert alert-danger">
                                {{$msg}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <input name="submit" type="submit" value="add" class="btn btn-success">
            </form>
        </div>
    </div>

@endsection