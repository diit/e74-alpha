<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use App\Attribute;
use Gate;

class ProfileController extends Controller
{
    function __construct()
    {
      $this->middleware('profile.complete', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Gate::denies('admin')) {
          abort(403);
      }
      $profiles = Profile::all();
      return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'profile.pitch'     => 'required',
        'profile.position'  => 'required',
        'profile.gender'    => 'required',
        'profile.website'   => 'required',
        'profile.city'      => 'required',
        'profile.country'   => 'required'
      ]);

      $profile = Profile::create([
          'pitch'     => $request->profile['pitch'],
          'position'  => $request->profile['position'],
          'gender'    => $request->profile['gender'],
          'website'   => $request->profile['website'],
          'city'      => $request->profile['city'],
          'country'   => $request->profile['country'],
          'user_id'   => Auth::user()->id,
      ]);

      foreach ($request->skills as $skill) {
        $profile->attributes()->save(
          Attribute::create([
            'name'        => $skill['name'],
            'content'     => $skill['content'],
            'profile_id'  => $profile->id,
          ])
        );
      }

      return $profile;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Gate::denies('admin')) {
          abort(403);
      }
      $profile = Profile::find($id);
      return view('profiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (Gate::denies('admin')) {
          abort(403);
      }
      $profile = Profile::find($id);
      return view('profiles.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (Gate::denies('admin')) {
          abort(403);
      }
      $this->validate($request, [
        'profile.pitch'     => 'required',
        'profile.position'  => 'required',
        'profile.gender'    => 'required',
        'profile.website'   => 'required',
        'profile.city'      => 'required',
        'profile.country'   => 'required'
      ]);

      $profile = Profile::create([
          'pitch'     => $request->profile['pitch'],
          'position'  => $request->profile['position'],
          'gender'    => $request->profile['gender'],
          'website'   => $request->profile['website'],
          'city'      => $request->profile['city'],
          'country'   => $request->profile['country'],
          'user_id'   => Auth::user()->id,
      ]);

      foreach ($request->skills as $skill) {
        $profile->attributes()->save(
          Attribute::create([
            'name'        => $skill['name'],
            'content'     => $skill['content'],
            'profile_id'  => $profile->id,
          ])
        );
      }

      return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Gate::denies('admin')) {
          abort(403);
      }
      Profile::findOrFail($id)->delete();
      return redirect('/profile');
    }
}
