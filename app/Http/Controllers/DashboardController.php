<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
  /**
   * Display the dashboard
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('dashboard.index', ['user' => Auth::user()]);
  }
}
