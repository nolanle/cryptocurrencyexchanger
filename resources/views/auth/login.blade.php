@extends('layouts.taurus')

@section('content')
    <div class="login-block">
        <div class="block block-transparent">
            <div class="head">
                <div class="user">
                    <div class="info user-change">
                        <img src="{{ asset('img/example/user/dmitry_b.jpg')}}" class="img-circle img-thumbnail"/>
                        <div class="user-change-button">
                            <span class="icon-off"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content controls npt">
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-row ">
                        <div class="col-md-12">
                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group-addon">
                                    <span class="icon-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required autofocus/>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-key"></span>
                                </div>
                                <input class="form-control" id="password" type="password" name="password" required placeholder="Password"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default btn-block btn-clean">Log In</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="{{ route('password.request') }}" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 tac"><strong>OR USE</strong></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="{{ url('login/facebook') }}" class="btn btn-info btn-block"><span class="icon-facebook"></span> &nbsp; Facebook</a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="{{ url('login/google') }}" class="btn btn-danger btn-block"><span class="icon-google-plus"></span> &nbsp; Google</a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="{{ url('login/twitter') }}" class="btn btn-primary btn-block"><span class="icon-twitter"></span> &nbsp; Twitter</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
