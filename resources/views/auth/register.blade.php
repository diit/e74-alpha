@extends('layouts.main')

@section('title')Login @endsection

@section('content')
<div class="container">
  <div id="gradient" class="login__bg" style="background: -webkit-gradient(linear, 0% 0%, 100% 0%, from(rgb(195, 152, 148)), to(rgb(52, 5, 165)));"></div>
  <div class="row login">
    <div class="col-md-6 col-md-offset-3">
      <div class="well">
        <form method="POST" action="/register" class="form-horizontal">
          {!! csrf_field() !!}
          <fieldset>
            <legend>Register</legend>

            <div class="form-group">
              <label for="Name" class="col-md-2 control-label">Name</label>

              <div class="col-md-10">
                <input type="text" class="form-control" id="Name" placeholder="Name" name="name" value="{{ old('name') }}">
              </div>
            </div>

            <div class="form-group">
              <label for="Email" class="col-md-2 control-label">Email</label>

              <div class="col-md-10">
                <input type="email" class="form-control" id="Email" placeholder="Email" name="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label for="Password" class="col-md-2 control-label">Password</label>

              <div class="col-md-10">
                <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
              </div>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="col-md-2 control-label">Confirm Password</label>

              <div class="col-md-10">
                <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
