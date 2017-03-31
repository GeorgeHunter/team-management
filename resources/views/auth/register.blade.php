@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2" style="margin-top: 48px;">

            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}



                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="name">Name</label>
                            <input type="text" class="form-control form-control-error" id="name" name="name">
                            @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="email">Email</label> <br>
                            <small>Ensure you sign up with the email you normally receive 3 Counties correspondence from</small>
                            <input type="text" class="form-control form-control-error" id="email" name="email">
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
                            <label for="password-confirm" class="control-label">Confirm Password</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
