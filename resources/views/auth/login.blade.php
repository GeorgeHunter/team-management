@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" style="margin-top: 48px;">

            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}



                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" class="form-control form-control-error" id="email" name="email">
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="password">Password</label>
                            <input type="password" class="form-control form-control-error" id="password" name="password">
                            @if ($errors->has('password'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
