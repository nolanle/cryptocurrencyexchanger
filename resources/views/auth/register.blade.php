@extends('layouts.taurus')

@section('content')
    <div class="registration-block">
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

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group-addon">
                                <span class="icon-envelope"></span>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label><input type="checkbox" name="agree" required/> I agree with <a>Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default btn-block btn-clean">Register Now</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 tac"><strong>OR USE</strong></div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <a href="{{ url('login/facebook') }}" class="btn btn-info btn-block"><span class="icon-facebook"></span> &nbsp; Facebook</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('login/google') }}" class="btn btn-danger btn-block"><span class="icon-google-plus"></span> &nbsp; Google</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('login/twitter') }}" class="btn btn-primary btn-block"><span class="icon-twitter"></span> &nbsp; Twitter</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
