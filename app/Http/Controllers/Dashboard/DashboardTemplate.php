<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardTemplate extends Controller{

  // public function __construct(){
  //   $this->middleware('auth');
  // }

  public function index(){
    return view("dashboard.index");
  }

  public function exit(){
    Auth::logout();
    return view('welcome');
  }

}
