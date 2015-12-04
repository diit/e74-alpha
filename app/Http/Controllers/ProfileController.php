<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use App\Attribute;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
