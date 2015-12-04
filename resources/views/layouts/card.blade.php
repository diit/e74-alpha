@extends('layouts.main')

@section('content')
<div class="container">
  <div id="gradient" class="login__bg" style="background: -webkit-gradient(linear, 0% 0%, 100% 0%, from(rgb(195, 152, 148)), to(rgb(52, 5, 165)));"></div>
  <div class="row login">
    <div class="col-md-8 col-md-offset-2">
      <div class="well">
        @yield('card-content')
      </div>
    </div>
  </div>
</div>
@endsection
