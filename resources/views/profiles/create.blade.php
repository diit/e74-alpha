@extends('layouts.card')

@section('title')Complete Profile @endsection

@section('card-content')
<div id="v-app">
  <h1>Hey, lets build your profile</h1>
  <validator name="validation">
    <form v-on:submit.prevent="saveProfile" novalidate>
      {!! csrf_field() !!}

      <div v-show="errors.length" class="row">
        <div class="col-sm-12">
          <div class="alert alert-danger">
            <ul>
                <li>All Fields are Required</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group is-empty col-sm-12">
          <label for="textArea" class="col-md-2 control-label">Pitch</label>
          <div class="col-md-10">
            <textarea v-model="profile.pitch" class="form-control" rows="3"
              id="pitch" name="pitch" placeholder="Pitch" v-validate:pitch.required></textarea>
            <span class="help-block">Who are you {{ explode(' ', $user->name)[0] }}?</span>
          </div>
          <span class="material-input"></span>
        </div>

        <div class="form-group is-empty col-sm-12">
          <label for="position" class="col-md-2 control-label">Your Position</label>
          <div class="col-md-10">
            <input v-model="profile.position" v-validate:position.required type="text"
              class="form-control" id="position" placeholder="What do you do?" name="position">
          </div>
          <span class="material-input"></span>
        </div>

        <div class="form-group col-sm-12 col-md-6">
          <label for="gender" class="col-md-4 control-label">Gender</label>
          <div class="col-md-8">
            <select v-model="profile.gender" v-validate:gender.required id="gender" class="form-control" name="gender">
              <option>Female</option>
              <option>Male</option>
              <option>Not Specified</option>
            </select>
          </div>
        <span class="material-input"></span></div>

        <div class="form-group is-empty col-sm-6">
          <label for="website" class="col-md-2 control-label">Website</label>
          <div class="col-md-10">
            <input v-model="profile.website" v-validate:website.required type="text"
              class="form-control" id="website" placeholder="Website" name="website">
          </div>
          <span class="material-input"></span>
        </div>

        <div class="form-group is-empty col-sm-6">
          <label for="city" class="col-md-4 control-label">City</label>
          <div class="col-md-8">
            <input v-model="profile.city" v-validate:city.required type="text"
              class="form-control" id="city" placeholder="City" name="city">
          </div>
          <span class="material-input"></span>
        </div>

        <div class="form-group is-empty col-sm-6">
          <label for="country" class="col-md-2 control-label">Country</label>
          <div class="col-md-10">
            <input v-model="profile.country" v-validate:country.required type="text"
              class="form-control" id="country" placeholder="Country" name="country">
          </div>
          <span class="material-input"></span>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-sm-8">
          <h2>Add your skills</h2>
        </div>
        <div class="col-sm-4">
          <a v-on:click="addSkill = !addSkill" class="btn btn-raised btn-block">Add Some Skills</a>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-10 col-sm-push-1 profile__nothing-yet text-center" v-show="!skills.length">
          <h3>Nothing Here Yet..</h3>
        </div>

        <div v-show="addSkill" class="profile__add-skill animated fadeInDown">

          <div class="form-group is-empty col-sm-12">
            <label for="name" class="col-md-2 control-label">Name</label>
            <div class="col-md-10">
              <input v-model="newSkill.name" v-validate:skill-name.required type="text"
                class="form-control" id="name" placeholder="Name">
            </div>
            <span class="material-input"></span>
          </div>

          <div class="form-group is-empty col-sm-12">
            <label for="description" class="col-md-2 control-label">Description</label>
            <div class="col-md-10">
              <textarea v-model="newSkill.content" v-validate:skill-desc.required
                class="form-control" rows="3" id="description" placeholder="Description"></textarea>
            </div>
            <span class="material-input"></span>
          </div>

          <a v-on:click="createSkill" class="btn btn-secondary">Add Skill</a>

        </div>

        <div v-for="skill in skills" class="col-sm-4">
          <div class="profile__skill panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">@{{ skill.name }} <span v-on:click="deleteSkill($index)" class="pull-right">X</span></h3>
            </div>
            <div class="panel-body">
              @{{ skill.content }}
            </div>
          </div>
        </div>

      </div>

      <input type="submit" class="btn btn-raised btn-primary profile__submit" value="Complete Profile">

    </form>
  </validator>

  <div class="well" style="position: fixed;top: 10px;right: 10px; max-width:30%;">
    <pre> @{{ $data | json }} </pre>
  </div>
</div>
@endsection
