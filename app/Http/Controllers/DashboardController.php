<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  /**
   * Display the dashboard
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('dashboard.index');
  }
}
