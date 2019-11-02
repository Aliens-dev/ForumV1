@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="user-login">
        <div class="container">
            <form class="form" action="{{route('user.login.get')}}" method="post">
                @csrf
                <div class="form-group">
                    <input name="email" type="email" placeholder="Email" class="form-control">
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $msg)
                            <div class="alert alert-danger p-1 mt-2">
                                {{$msg}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Password" class="form-control">
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $msg)
                                <div class="alert alert-danger p-1 mt-2">
                                    {{$msg}}
                                </div>
                            @endforeach
                        @endif
                </div>
                <input name="submit" type="submit" value="login" class="btn btn-primary">
                @if(session()->has('failed'))
                    <div class="alert alert-danger mt-2 p-1">
                        {{session()->get('failed')}}
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection