@extends('layouts.card')

@section('title')Profile @endsection

@section('card-content')
<div id="v-app">
  <div class="row">
    <div class="col-sm-12 text-center">
      <h1>{{ $profile->user->name }}'s Profile</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <p>{{ $profile->pitch }}</p>
    </div>
    <div class="col-sm-12">
      <ul class="list-group profile__listing">
        <li type="button" class="list-group-item profile__feature col-sm-6">
          <h4>Position: {{ $profile->position }}</h4>
        </li>
        <li type="button" class="list-group-item profile__feature col-sm-6">
          <h4>Gender: {{ $profile->gender }}</h4>
        </li>
        <li type="button" class="list-group-item profile__feature col-sm-6">
          <h4>Place: {{ $profile->city }}, {{ $profile->country }}</h4>
        </li>
        <li type="button" class="list-group-item profile__feature col-sm-6">
          <h4>Website: <a href="{{ $profile->website }}">Website</a></h4>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>      <iframe frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?q={{ $profile->city }}+{{ $profile->country }}&key=AIzaSyASN0LCcS824wrVi1fGeAZRfoB4dmpDFQk' allowfullscreen></iframe></div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <h2>Skills</h2>
      @foreach ($profile->attributes as $skill)
      <div class="col-sm-4">
        <div class="profile__skill panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">{{ $skill->name }}</h3>
          </div>
          <div class="panel-body">
            {{ $skill->content }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <a type="button" class="btn btn-default" aria-label="Go Back" href="/profile">
    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
    Back
  </a>
</div>
@endsection
