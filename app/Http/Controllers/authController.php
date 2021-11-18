<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class authController extends Controller
{
    public function login(Request $request)
	{
		return view('login');
	}

	public function loginpost(Request $request)
	{
		$request->validate([
			'email' => 'required',
			'password' => 'required',
		]);

		$email = $request->email;
		$password = $request->password;

		$data = [
			'email' => $email,
			'password' => $password
		];

		if (Auth::attempt($data) && Auth::user()->role_id == '1') {
			return redirect('admin/dashboard');
		} elseif (Auth::attempt($data) && Auth::user()->role_id == '2') {
			return redirect('business/dashboard');
		}
		else {
			return back()->with('error', 'wrong username and password');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect('login')->with('success','You are successfully log out.' );
	}
}
