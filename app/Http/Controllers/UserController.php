<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Patient;
use Session;
use Hash;

class UserController extends Controller
{

	public function __construct(
		User $user,
		Patient $patient
	){
		$this->user = $user;
		$this->patient = $patient;
	}


	public function loginpage()
	{
		if (Auth::check()) {
			return redirect('option_management');
		}else{
			return view('account.login');
		}
	}


	public function login(Request $request)
	{

        // getting user's inputs
		$username = $request->username;
		$password = $request->password;

        // check username is valid or not
		$check_username =  DB::table('users')->where('username',$request->username)->first();

		if(!empty($check_username)){
			if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
				if (Auth::user()->role == '1') {
					return redirect('option_management');
				} else if (Auth::user()->role == '2') {
					return redirect('user_dashboard');
				} else {
					Auth::logout();
					Session::flash('error', "Please fill valid email or password!");
					return redirect('login');
				}
			}else{
				return back()->with('error','Invalid Password!');
			} 
		}else{
			return back()->with('error','Invalid Username!');
		}

	}



	public function logout(Request $request)
	{
		Auth::logout();
		return redirect('login')->with('success','You\'re successfully log out.' );
	}


	public function option_management()
	{

		$options = DB::table('options')->get();

		return view('users.options', compact('options'));
	}

	public function addOption()
	{
		return view('users.addOption');
	}

	public function insertOption(Request $request)
	{
		$this->validate(
			$request,
			[
				'Title' => 'required',
				'Description' => 'required',

			]
		);

		$data = array(
			'title' => $request->Title,
			'link' => @$request->Link,
			'description' => $request->Description,
			'clicked'=>0,
			'shown'=>0,
		);
		DB::table('options')->insert($data);
		Session::flash('success', 'Option added successfully!');
		return redirect('option_management');
	}

	public function editOption($id)
	{
		$data = DB::table('options')->where('id', $id)->first();
		return view('users.editOption')->with('data', $data);
	}

	public function updateOption(Request $request)
	{

		$this->validate(
			$request,
			[
				'title' => 'required',
				'description' => 'required',
			]
		);

		$data = array(
			'title' => $request->title,
			'link' => @$request->link,
			'description' => $request->description,
		);

		$result = DB::table('options')->where('id', $request->option_id)->update($data);
		Session::flash('success', 'Option updated successfully!');
		return redirect('option_management');
	}

	public function statusUser($id)
	{
		DB::table('options')->where('id',$id)->delete();
		return redirect('/option_management')->with('success','deleted successfully');
	}

	// public function index(Request $request)
	// {
	// 	$option1 = DB::table('options')->inRandomOrder()->first();
	// 	$option2 = DB::table('options')->inRandomOrder()->first();		
	// 	while($option1->id == $option2->id) {
	// 		$option2 = DB::table('options')->inRandomOrder()->first();
	// 	}
	// 	shown($option1->id);
	// 	shown($option2->id);
	// 	return view('index')->with(['option1'=>$option1,'option2'=>$option2]);
	// }

	public function submitVote(Request $request)
	{
		clicked($request->id);
		$option1 = DB::table('options')->inRandomOrder()->first();
		$option2 = DB::table('options')->inRandomOrder()->first();		
		while($option1->id == $option2->id) {
			$option2 = DB::table('options')->inRandomOrder()->first();
		}
		shown($option1->id);
		shown($option2->id);

		$data = "";
		$data.= '<div id="optionDiv" style="width: 100%;display:none;">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<label for="'.$option1->id.'">
					<input type="radio" name="option" id="'.$option1->id.'" value="'.$option1->id.'" class="card-input-element" />
					<div class="card card-default card-input">
						<div class="card-header">'.$option1->title.'</div>
						<div class="card-body">
							'.$option1->description.'
						</div>
					</div>
				</label>
			</div>
		
			<div class="col-md-12 col-lg-12 col-sm-12">
				<label for="'.$option2->id.'">
					<input type="radio" name="option" id="'.$option2->id.'" value="'.$option2->id.'" class="card-input-element" />
					<div class="card card-default card-input">
						<div class="card-header">'.$option2->title.'</div>
						<div class="card-body">
							'.$option2->description.'
						</div>
					</div>
				</label>
			</div>
		</div>';

		return $data;

	}

}
