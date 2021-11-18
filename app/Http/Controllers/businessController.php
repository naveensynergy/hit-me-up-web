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

	public function promotions()
	{
		$promotions = DB::table('promotions')->get();
		return view('business.promotions', ['promotions' => $promotions]);
	}

	public function addPromotion()
	{
		$promotions = DB::table('promotions')->get();
		return view('business.addPromotion', ['promotions' => $promotions]);
	}

	public function storePromotion(Request $request)
	{
		// dd($request->all());
		// dd(Auth::user()->id);
		$request->validate([
			'title' => 'required',
			'description' => 'required',
			'type' => 'required',
			'discount' => 'required',
		]);

		$title = $request->title;
		$description = $request->description;
		$type = $request->type;
		$discount = $request->discount;

		$data = array(
			'business_id' => Auth::user()->id,
			'title' => $title,
			'description' => $description,
			'discount_type' => $type,
			'discount' => $discount,
			'created_at' => date('Y-m-d H:i:s'),
		);

			DB::table('promotions')->insert($data);
		return redirect('business/promotions')->with('success', 'Promotion added successfully.');
	}

	public function editPromotion($promotion_id)
	{
		$promotion = DB::table('promotions')->where('id', $promotion_id)->first();
		return view('business.editPromotion', ['promotion' => $promotion]);
	}

	public function updatePromotion(Request $request, $promotion_id)
	{
		// dd($request->all());
		$request->validate([
			'title' => 'required',
			'description' => 'required',
			'type' => 'required',
			'discount' => 'required',
		]);

		$title = $request->title;
		$description = $request->description;
		$type = $request->type;
		$discount = $request->discount;

		$data = array(
			'business_id' => Auth::user()->id,
			'title' => $title,
			'description' => $description,
			'discount_type' => $type,
			'discount' => $discount,
			'created_at' => date('Y-m-d H:i:s'),
		);

		DB::table('promotions')->where('id', $promotion_id)->where('business_id', Auth::user()->id)->update($data);
		return redirect('business/promotions')->with('success', 'Promotion updated successfully.');
	}

	public function deletePromotion($promotion_id)
	{
		DB::table('promotions')->where('id', $promotion_id)->delete();
		return redirect('business/promotions')->with('success', 'Promotion deleted successfully.');
	}

	public function viewPromotion($promotion_id)
	{
		$promotion = DB::table('promotions')->where('id', $promotion_id)->first();
		return view('business.viewPromotion', ['promotion' => $promotion]);	
	}
}
