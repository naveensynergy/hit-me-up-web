<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVerify;
use Auth;
use DB;
use Hash;
use Str;
use Mail;

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
			return redirect('/login')->with('error', 'Wrong e-mail or password!');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect('login')->with('success','You are successfully log out.' );
	}

	public function SignUp()
	{
		$countries = DB::table('countries')->get();
		$states = DB::table('states')->get();
		$phonecodes = DB::table('phonecodes')->get();
		$categories = DB::table('business_categories')->where('status', 1)->where('parent_id', 0)->get();
		return view('business.business_signup', [
			'countries' => $countries,
			'states' => $states,
			'categories' => $categories,
			'phonecodes' => $phonecodes,
		]);
	}

	public function storeBusiness(Request $request)
	{
		// dd($request->all());
		$cat_id = 0;
		if (!empty($request->subcat_id)) {
			$cat_id = $request->subcat_id;
		} else {
			$cat_id = $request->category_id;
		}

		$request->validate([
			'business_name' => 'required',
			'email' => 'required|email|unique:users',
			'mobile' => 'required|numeric|unique:users',
			'password' => 'required',
			'address' => 'required',
			'city' => 'required',
			'pincode' => 'required',
			'country_id' => 'required',
			'state_id' => 'required',
			'category_id' => 'required',
		]);

		$token = Str::random(64);
		$data1 = array(
			'role_id' => 2,
			'name' => $request->business_name,
			'mobile' => $request->mobile,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'status' => 1,
			'is_approved' => 0,
			'is_email_verified' => 0,
			'created_at' => date('Y-m-d H:i:s')
		);

		$user_id = DB::table('users')->insertGetId($data1);

		$data2 = array(
			'user_id' => $user_id,
			'country_id' => $request->country_id,
			'state_id' => $request->state_id,
			'city' => $request->city,
			'phonecode' => $request->phonecode,
			'address' => $request->address,
			'mobile' => $request->mobile,
			'pincode' => $request->pincode,
			'created_at' => date('Y-m-d H:i:s'),
		);

		// UserVerify::where('user_id', $user_id)->delete();
		// DB::table('users_verify')->where('user_id', $user_id)->delete();

		DB::table('user_details')->insert($data2);
		DB::table('business_categories_linking')->insert([
			'business_id' => $user_id,
			'category_id' => $cat_id,
		]);

		DB::table('users_verify')->insert([
			'user_id' => $user_id,
			'token' => $token,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		Mail::send('mail.signup_success', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});
		$msg = array('title' => 'Registered!', 'text' => 'Please verify your email to activate your account!');

		return redirect('/login')->with('msg', $msg);
	}

	public function verifyBusiness($token)
	 {
			$verifyUser = DB::table('users_verify')->where('token', $token)->first();
			if (!empty($verifyUser)) {
			$user_id = $verifyUser->user_id;
			$user = DB::table('users')->where('id', $user_id)->first();
			}

			if (!is_null($verifyUser)) {

				if ($user->is_email_verified == 0) {
					// $token_time = strtotime($verifyUser->created_at);
					// $current_time = strtotime(date('Y-m-d H:i:s'));
					// $diff_min =  round(abs($current_time - $token_time) / 60, 2);
					// if ($diff_min > 15) {
					// 	// return array("message" => 'Link is expired');
					// 	return redirect('/login')->with('error', 'Link is expired.');
					// }
					DB::table('users')->where('id', $user_id)->update(['is_email_verified' => 1]);
				// DB::table('users_verify')->where('token', $token)->delete();
				$msg = array('title' => 'Email Verified!', 'text' => 'Your e-mail is verified, Account will be approved by admin. You will be notified through e-mail once done.');
				return redirect('/login')->with('success-verify', 'Your e-mail is verified.');
				} else {
				// $message = "Your e-mail is already verified. You can now login.";
				return redirect('/login')->with('verified', 'Your e-mail is already verified. You can now login.');
				}
			} else {
			return redirect('/login')->with('error', 'Sorry your email cannot be identified.');
			}
		}
}
