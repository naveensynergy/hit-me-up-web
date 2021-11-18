<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class businessController extends Controller
{
    public function dash_index()
	{
		return view('business.dashboard');
	}

	public function businessSignUp()
	{
		$categories = DB::table('business_categories')->get();
		return view('business.business_signup', compact('categories'));
	}

	public function businessSignUpProcess(Request $request)
	{
		// dd($request->all());
		$request->validate([
			'business_name' => 'required',
			'email' => 'required|email|unique:users,email',
			'mobile' => 'required|numeric|min:10',
			'address' => 'required',
			'password' => 'required',
			'product_category' => 'required',
		]);

		$data = array(
			'role' => 2,
			'name' => $request->business_name,
			'email' => $request->email,
			'mobile' => $request->mobile,
			'address' => $request->address,
			'password' => Hash::make($request->password),
			'product_category_id' => $request->product_category,
			'status' => 0,
			'created_at' => date('Y-m-d H:i:s'),
		);

		DB::table('users')->insert($data);
		return redirect()->back()->with('success', 'Business Registered Successfully!');
	}

	public function businessOwnerList()
	{
		dd('yes');
		$businesses = DB::table('users')->where('role', 2)->get();
		return view('business.business_owner_list', compact('businesses'));
	}
}
