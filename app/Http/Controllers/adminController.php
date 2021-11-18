<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\User;
use App\Http\Controllers\Generalcontroller as Generalcontroller;

class adminController extends Controller
{
	public function dash_index()
	{
		return view('admin.dashboard');
	}
	
	public function businessesList()
	{
		$businesses = DB::table('users')
		->join('business_categories_linking', 'business_categories_linking.business_id', '=', 'users.id')
		->join('user_details', 'user_details.user_id', '=', 'users.id')
		->where('users.role_id', 2)->where('users.is_email_verified', 1)->get();
		
		// dd($businesses);
		return view('admin.businessesList', ['businesses' => $businesses]);
	}
	
	public function addBusiness()
	{
		$countries = DB::table('countries')->get();
		$states = DB::table('states')->get();
		$phonecodes = DB::table('phonecodes')->get();
		$categories = DB::table('business_categories')->where('status', 1)->where('parent_id', 0)->get();
		return view('admin.addBusiness', [
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
		
		$data1 = array(
			'role_id' => 2,
			'name' => $request->business_name,
			'mobile' => $request->mobile,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'status' => 1,
			'is_approved' => 1,
			'is_email_verified' => 1,
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
		
		DB::table('user_details')->insert($data2);
		DB::table('business_categories_linking')->insert([
			'business_id' => $user_id,
			'category_id' => $cat_id,
		]);
		
		return redirect('admin/businesses')->with('success', 'Business added successfully.');
	}
	
	public function businessEdit($business_id)
	{
		$countries = DB::table('countries')->get();
		$states = DB::table('states')->get();
		$phonecodes = DB::table('phonecodes')->get();
		$categories = DB::table('business_categories')->where('status', 1)->where('parent_id', 0)->get();
		$business_data = DB::table('users')
		->join('user_details', 'user_details.user_id', '=', 'users.id')
		->join('business_categories_linking', 'business_categories_linking.business_id', '=', 'users.id')
		->where('users.id', $business_id)->first();
		
		$category_id = $business_data->category_id;
		$cat_id = DB::table('business_categories')->where('id', $category_id)->where('status', 1)->where('parent_id', 0)->first();
		$sub_cat_id = DB::table('business_categories')->where('id', $category_id)->where('status', 1)->where('parent_id','!=', 0)->first();
		// dd($cat_id, $sub_cat_id);
		
		// $category = $sub_cat->parent_id;
		return view('admin.editBusiness', [
			'countries' => $countries,
			'states' => $states,
			'categories' => $categories,
			'phonecodes' => $phonecodes,
			'result' => $business_data,
			'cat_id' => $cat_id,
			'sub_cat_id' => $sub_cat_id,
		]);
	}
	
	public function businessUpdate(Request $request, $business_id)
	{
		// dd($business_id);
		$cat_id = 0;
		if (!empty($request->subcat_id)) {
			$cat_id = $request->subcat_id;
		} else {
			$cat_id = $request->category_id;
		}
		
		$request->validate([
			'business_name' => 'required',
			'email' => 'required|email|unique:users,email,'.$business_id,
			'mobile' => 'required|numeric|unique:users,mobile,'.$business_id,
			'status' => 'required',
			'address' => 'required',
			'city' => 'required',
			'pincode' => 'required',
			'country_id' => 'required',
			'state_id' => 'required',
			'category_id' => 'required',
		]);
		
		$data1 = array(
			'role_id' => 2,
			'name' => $request->business_name,
			'mobile' => $request->mobile,
			'email' => $request->email,
			'is_approved' => $request->status,
			'is_email_verified' => 1,
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s')
		);
		
		// dd($data1);
		
		// $user_id = DB::table('users')->insertGetId($data1);
		DB::table('users')->where('id', $business_id)->update($data1);
		
		$data2 = array(
			'user_id' => $business_id,
			'country_id' => $request->country_id,
			'state_id' => $request->state_id,
			'city' => $request->city,
			'phonecode' => $request->phonecode,
			'address' => $request->address,
			'mobile' => $request->mobile,
			'pincode' => $request->pincode,
			'created_at' => date('Y-m-d H:i:s'),
		);
		
		DB::table('user_details')->where('user_id', $business_id)->update($data2);
		DB::table('business_categories_linking')->where('business_id', $business_id)->update([
			'business_id' => $business_id,
			'category_id' => $cat_id,
		]);
		
		return redirect('admin/businesses')->with('success', 'Business updated successfully.');
	}
	
	public function businessView($business_id)
	{
		$business_data = DB::table('users')
		->join('user_details', 'user_details.user_id', '=', 'users.id')
		->join('business_categories_linking', 'business_categories_linking.business_id', '=', 'users.id')
		->where('users.id', $business_id)->first();
		
		// dd($business_data);
		
		return view('admin.viewBusiness', [
			'result' => $business_data,
		]);
	}
	
	public function businessDelete($business_id)
	{
		DB::table('users')->where('id', $business_id)->delete();
		DB::table('user_details')->where('user_id', $business_id)->delete();
		DB::table('business_categories_linking')->where('business_id', $business_id)->delete();
		
		return redirect('admin/businesses')->with('success', 'Business deleted successfully.');
	}
	
	public function getStates(Request $request)
	{
		$country_id = $request->country_id;
		$sat = "";
		$states = DB::table('states')->where('country_id', $request->country_id)->get();
		if (count($states) > 0) {
			foreach ($states as $key => $state) {
				$sat .= '<option value="' . $state->id . '">' . $state->name . '</option>';
			}
		} else {
			$sat = '<option value="">Not found</option>';
		}
		return $sat;
	}
	
	public function getCategories(Request $request)
	{
		// dd($request->all());
		$category_id = $request->category_id;
		$sub = '';
		$sub_categories = DB::table('business_categories')->where('parent_id', $category_id)->where('status', 1)->get();
		if (count($sub_categories) > 0) {
			foreach ($sub_categories as $key => $sub_category) {
				$sub .= '<option value="' . $sub_category->id . '">' . $sub_category->category_name . '</option>';
			} 
		} else {
			$sub = 'false';
		}
		return $sub;
	}
	
	public function categories()
	{
		$categories = DB::table('business_categories')->get();
		return view('admin.categories', ['categories' => $categories]);
	}
	
	public function addCategory()
	{
		$categories = DB::table('business_categories')->where('parent_id', 0)->get();
		return view('admin.addCategory', ['categories' => $categories]);	
	}
	
	public function storeCategory(Request $request)
	{
		// dd($request->all());
		$category = $request->category;
		if ($category == 0) {
			$request->validate([
				'category_name' => 'required',
			]);
			
			// dd($request->all());
			
			DB::table('business_categories')->insert([
				'category_name' => $request->category_name,
				'status' => 1,
				'created_at' => date('Y-m-d H:i:s'),
			]);
		} else {
			$request->validate([
				'category_id' => 'required',
				'sub_cat_name' => 'required',
			]);
			
			// dd($request->all());
			DB::table('business_categories')->insert([
				'parent_id' => $request->category_id,
				'category_name' => $request->sub_cat_name,
				'status' => 1,
				'created_at' => date('Y-m-d H:i:s'),
			]);
		}
		return redirect('admin/categories')->with('success', 'Category added successfully.');
	}
	
	public function editCategory($category_id)
	{
		$categories = DB::table('business_categories')->where('parent_id', 0)->get();
		$category_data = DB::table('business_categories')->where('id', $category_id)->first();
		return view('admin.editCategory', ['categories' => $categories,'category_data' => $category_data,]);
	}
	
	public function updateCategory(Request $request, $cat_id)
	{
		// dd($request->all());
		$category = $request->category;
		if ($category == 0) {
			$request->validate([
				'category_name' => 'required',
			]);
			
			DB::table('business_categories')->where('id', $cat_id)->update([
				'category_name' => $request->category_name,
				'status' => 1,
				'updated_at' => date('Y-m-d H:i:s'),
			]);
		} else {
			$request->validate([
				'category_id' => 'required',
				'sub_cat_name' => 'required',
			]);
			
			DB::table('business_categories')->where('id', $cat_id)->update([
				'parent_id' => $request->category_id,
				'category_name' => $request->sub_cat_name,
				'status' => 1,
				'updated_at' => date('Y-m-d H:i:s'),
			]);
		}
		return redirect('admin/categories')->with('success', 'Category updated successfully.');
	}
	
	public function deleteCategory($cat_id)
	{
		DB::table('business_categories')->where('id', $cat_id)->delete();
		return redirect('admin/categories')->with('success', 'Category deleted successfully.');
	}
	
	// Promotion Module Start
	public function promotions()
	{
		$promotions = DB::table('promotions')->get();
		return view('admin.promotions', ['promotions' => $promotions]);
	}
	
	public function addPromotion()
	{
		$promotions = DB::table('promotions')->get();
		$business_list = DB::table('users')->where('role_id', 2)->where('is_approved', 1)->where('is_email_verified', 1)->get();
		return view('admin.addPromotion', ['promotions' => $promotions, 'business_list' => $business_list]);
	}
	
	public function storePromotion(Request $request)
	{
		// dd($request->all());
		// dd(Auth::user()->id);
		$request->validate([
			'business' => 'required',
			'title' => 'required',
			'description' => 'required',
			'type' => 'required',
			'discount' => 'required',
		]);
		
		$title = $request->title;
		$description = $request->description;
		$type = $request->type;
		$discount = $request->discount;
		$business_id = $request->business;
		
		$data = array(
			'business_id' => $business_id,
			'title' => $title,
			'description' => $description,
			'discount_type' => $type,
			'discount' => $discount,
			'created_at' => date('Y-m-d H:i:s'),
		);
		
		DB::table('promotions')->insert($data);
		return redirect('admin/promotions')->with('success', 'Promotion added successfully.');
	}
	
	public function editPromotion($promotion_id)
	{
		$business_list = DB::table('users')->where('role_id', 2)->where('is_approved', 1)->where('is_email_verified', 1)->get();
		$promotion = DB::table('promotions')->where('id', $promotion_id)->first();
		return view('admin.editPromotion', [
			'promotion' => $promotion,
			'business_list' => $business_list,
		]);
	}
	
	public function updatePromotion(Request $request, $promotion_id)
	{
		// dd($request->all());
		$request->validate([
			'title' => 'required',
			'description' => 'required',
			'type' => 'required',
			'discount' => 'required',
			'business' => 'required',
		]);
		
		$title = $request->title;
		$description = $request->description;
		$type = $request->type;
		$discount = $request->discount;
		$business_id = $request->business;
		
		$data = array(
			'business_id' => $business_id,
			'title' => $title,
			'description' => $description,
			'discount_type' => $type,
			'discount' => $discount,
			'created_at' => date('Y-m-d H:i:s'),
		);
		
		DB::table('promotions')->where('id', $promotion_id)->where('business_id', $business_id)->update($data);
		return redirect('admin/promotions')->with('success', 'Promotion updated successfully.');
	}
	
	public function deletePromotion($promotion_id)
	{
		DB::table('promotions')->where('id', $promotion_id)->delete();
		return redirect('admin/promotions')->with('success', 'Promotion deleted successfully.');
	}
	
	public function viewPromotion($promotion_id)
	{
		$promotion = DB::table('promotions')->where('id', $promotion_id)->first();
		return view('admin.viewPromotion', ['promotion' => $promotion]);
	}
	
	
	//---------------------------- subscriptions--------------------------------------------
	
	public function subscriptions(Request $request){
		if(count($request->all()) > 0){
			$subscriptions = DB::table('user_subscriptions');
			if(isset($request->sub_id) && ($request->sub_id != "")){
				$subscriptions->where('sub_id',$request->sub_id);
			}
			if(isset($request->search) && !empty($request->search)){
				$subscriptions->join('users','users.id','user_subscriptions.user_id')
				->where('name', 'like', '%' . $request->search . '%')
				->where(function ($query) use ($request) {
					$query->orWhere('mobile','like', '%' . $request->search . '%');
				});
				
			}
			$subscriptions->where('user_subscriptions.status',1)->orderBy('user_subscriptions.starts_at','desc');			
		}else{
			$subscriptions = DB::table('user_subscriptions')->where('status',1)->orderBy('id','desc');
		}
		$subscriptions = $subscriptions->paginate(10);
		// $subscriptions = $subscriptions->groupBy('user_subscriptions.user_id')->paginate(1);
		
		$packages = DB::table('subscriptions')->get();
		foreach ($subscriptions as $subscription){
			$subscription->user_id = (new User())->fetch_user_details($subscription->user_id);
			$subscription->sub_id = (new Generalcontroller())->subscriptions_detail($subscription->sub_id);
		}
		
		return view('admin.subscriptions', ['subscriptions' => $subscriptions,'packages' => $packages]);
		
	}

	public function viewSubscription($user_id){
		$user_details = (new User())->fetch_user_details($user_id);
		$subscriptions = DB::table('user_subscriptions')->where('user_id', $user_id)->orderBy('id','desc')->get();
		foreach ($subscriptions as $sub){
			$sub->sub_id = (new Generalcontroller())->subscriptions_detail($sub->sub_id);
		}

		return view('admin.viewSubscription', ['subscriptions' => $subscriptions,'user'=>$user_details]);
	}
	
}
