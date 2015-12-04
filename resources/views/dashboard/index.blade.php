@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>{{ $user->name }}</h1>
      <h3>{{ $user->profile->pitch }}</h3>
      <h4>Position: {{ $user->profile->position }}</h4>
      <h4>Gender: {{ $user->profile->gender }}</h4>
      <h4>Place: {{ $user->profile->city }}, {{ $user->profile->country }}</h4>
      <h4>Website: <a href="{{ $user->profile->website }}">Website</a></h4>
    </div>

    <div class="col-sm-6">
      <h2>Skills</h2>
      @foreach ($user->profile->attributes as $skill)
        <h4>{{ $skill->name }}</h4>
        <p>-- {{ $skill->content }}</p>
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>      <iframe frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?q={{ $user->profile->city }}+{{ $user->profile->country }}&key=AIzaSyASN0LCcS824wrVi1fGeAZRfoB4dmpDFQk' allowfullscreen></iframe></div>
    </div>
  </div>
</div>
@endsection
