@extends('layouts.card')

@section('title')Profiles @endsection

@section('card-content')
<div id="v-app">
  <h1>All Profiles</h1>

  <div class="list-group profile__listing">
    @foreach ($profiles as $profile)
    <a type="button" class="list-group-item profile__listing-item" href="/profile/{{ $profile->id }}">
      <h4>{{ $profile->user->name }} - {{ $profile->city }}</h4></a>
    @endforeach
  </div>
</div>
@endsection
