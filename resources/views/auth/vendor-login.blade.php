@extends('layouts.login_app')

@section('title', 'Login | Vendor')

@section('content')

<div class="header">
    <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
    <p class="lead">Login to your Vendor account</p>
</div>
<form class="form-auth-small" method="POST" action="{{ route('vendor.login.submit') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label sr-only">Email</label>
        <div>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label sr-only">Password</label>
        <div>
            <input type="password" class="form-control" id="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group clearfix">
        <label class="fancy-checkbox element-left">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>Remember me</span>
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
    <div class="bottom">
        <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
    </div>
</form>

@endsection