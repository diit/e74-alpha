@extends('layouts.main')

@section('title')Login @endsection

@section('content')
<div class="container">
  <div id="gradient" class="login__bg" style="background: -webkit-gradient(linear, 0% 0%, 100% 0%, from(rgb(195, 152, 148)), to(rgb(52, 5, 165)));"></div>
  <div class="row login">
    <div class="col-md-6 col-md-offset-3">
      <div class="well">
        <form method="POST" action="/login" class="form-horizontal">
          {!! csrf_field() !!}
          <fieldset>
            <legend>Login</legend>

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

            <div class="checkbox pull-right">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
