<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dash_index()
	{
		return view('admin.dashboard');
	}
}
