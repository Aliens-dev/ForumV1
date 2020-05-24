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
                                !
                            @endforeach
                        @endif
                </div>
            </div>
        </div>

        @endsection