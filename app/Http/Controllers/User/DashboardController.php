<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user')->except('logout');
    }

    public function getDashboard(){
       
        return view('user.dashboard');
    }
}
