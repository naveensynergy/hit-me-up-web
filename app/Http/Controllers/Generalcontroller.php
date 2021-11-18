<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Models\User;
use Auth;
use DB;


class Generalcontroller extends Controller
{
    public function signup(Request $request)
    {
        $user = new User();
        $return = $user->signup($request);
        exit(json_encode($return));
    }
    
    public function countriesList()
    {
        $obj = new \stdClass();
        $countries = DB::table('countries')->get();
        $obj->countries = $countries;
        $phonecodesList = DB::table('phonecodes')->get();
        $obj->phonecodesList = $phonecodesList;
        $return = array("message" => "", "data" => $obj, "status_code" => 200);
        exit(json_encode($return));
    }
    
    public function statesList($country_id)
    {
        $states = DB::table('states')->where('country_id',$country_id)->get();
        $return = array("message" => "", "data" => $states, "status_code" => 200);
        exit(json_encode($return));
    }
    
    
    public function login(Request $request)
    {
        $login_type = $request->login_type;
        
        if ($login_type == 1) {   // email password login
            $user = new User();
            $return = $user->loginWithPassword($request);
            exit(json_encode($return));
        } elseif ($login_type == 2) {  //  send otp 
            $user = new User();
            $return = $user->sendOtp($request);
            exit(json_encode($return));
        } elseif ($login_type == 3) {
            $user = new User();
            $return = $user->verifyOtp($request);
            exit(json_encode($return));
        }
    }
    
    public function verifyUser($token)
    {
        $user = new User();
        $return = $user->verifyEmail($token);
        exit(json_encode($return));
    }
    
    public function sendForgetPasswordLink(Request $request)
    {
        $user = new User();
        $return = $user->sendForgetPasswordLink($request);
        exit(json_encode($return));
    }
    
    public function changePassword($token = null)
    {
        $email = DB::table('password_resets')->where('token', $token)->first();
        if (empty($email)) {
            $return = array('message' => 'Invalid token, Please request new password reset!', 'data' => [], 'status' => 204);
            exit(json_encode($return));
        } else {
            $token_time = strtotime($email->created_at);
            $current_time = strtotime(date('Y-m-d H:i:s'));
            $diff_min =  round(abs($current_time - $token_time) / 60, 2);
            if ($diff_min > 15) {
                return array("message" => 'Link is expired', "data" => [], "status" => 204);
            }
            return view('common.changePassword', ['token' => $token, 'email' => $email->email]);
        }
    }
    
    public function changePasswordGet($token = null)
    {
        $email = DB::table('password_resets')->where('token', $token)->first();
        if (empty($email)) {
            $return = array('message' => 'Invalid token, Please request new password reset!', 'data' => [], 'status' => 204);
            exit(json_encode($return));
        }
        return view('common.changePassword', ['token' => $token, 'email' => $email->email]);
    }
    
    public function changePasswordPost(Request $request)
    {
        $user = new User();
        $return = $user->changePassword($request);
        exit(json_encode($return));
    }
    
    public function subscriptionsList()
    {
        $states = DB::table('subscriptions')->get();
        $return = array("message" => "", "data" => $states, "status_code" => 200);
        exit(json_encode($return));
    }
    
    public function checkSubscription(Request $request){
        $user_id = $request->user_id;
        $user_subscriptions = DB::table('user_subscriptions')->where('user_id', $user_id)->where('status',1)->whereDate('expires_at','>',getCurrentDate())->orderBy('id','desc')->get();
        
        $subObj = new \stdClass();
        if(count($user_subscriptions) > 0){
            $subObj->sub_active = 1;
            $subObj->showTrial = 0;
            
        }else{
            $trial_subscriptions = DB::table('user_subscriptions')->where('user_id', $user_id)->where('status',1)->where('type',0)->orderBy('id','desc')->get();
            
            $subObj->sub_active = 0;
            if(count($trial_subscriptions)>0){
                $subObj->showTrial = 0;
            }else{
                $subObj->showTrial = 1;
            }
            
        }
        $return = array("message" => "", "data" => $subObj, "status_code" => 200);
        exit(json_encode($return));
        
        
    }
    
    public function buySubscription(Request $request){
        $user_id = $request->user_id;
        $type = $request->type;
        $starts_at = getCurrentDate();
        
        if($type == 0){
            $sub_id = 0;
            $expires_at = date('Y-m-d', strtotime($starts_at. ' + 3 days')); 
            $status = 1;
            $payment_required= 0;
        }else{
            $sub_id = $request->sub_id;
            $subscription = $this->subscriptions_detail($sub_id);
            $validity = $subscription->validity; 
            $unit = $subscription->validity_unit;
            $status = 0;
            if($unit == 'year'){
                $expires_at = date('Y-m-d', strtotime($starts_at. ' + '.$validity.' years')); 
            }elseif($unit == 'month'){
                $expires_at = date('Y-m-d', strtotime($starts_at. ' + '.$validity.' months')); 
            } 
            $payment_required= 1;
        }
        
        $details = ['sub_id'=>$sub_id,'user_id'=>$user_id,'type'=>$type,'starts_at'=>1,'starts_at'=>$starts_at,'expires_at'=>$expires_at,'status'=>$status];
        $order_id =  DB::table('user_subscriptions')->insertGetId($details);
        $return = new \stdClass();
        $return->order_id = $order_id;
        $return->payment_required = $payment_required;
        $return = array("message" => "", "data" => $return, "status_code" => 200);
        exit(json_encode($return));
    }
    
    public function paySubscription(Request $request){
        $order_id = $request->order_id;
        $payment_id = $request->payment_id;
        
        $details = ['payment_id'=>$payment_id,'status'=>1];
        $order_id =  DB::table('user_subscriptions')->where('id', $order_id)->update($details);
        $return = array("message" => "Payment Succesful", "data" => 1, "status_code" => 200);
        exit(json_encode($return));
    }
    
    public function subscriptions_detail($sub_id){
        $subscriptions = DB::table('subscriptions')->where('id',$sub_id)->first();
        return $subscriptions;
    }
    
    
    public function categoriesList($id = null){
        if(!empty($id)){
            $business_categories = DB::table('business_categories')->where('parent_id',$id)->get(['id','category_name','parent_id']);
            $return = array("message" => "", "data" => $business_categories, "status_code" => 200);
            exit(json_encode($return));
        }else{
            $business_categories = DB::table('business_categories')->where('parent_id',0)->get(['id','category_name','parent_id']);
            $return = array("message" => "", "data" => $business_categories, "status_code" => 200);
            exit(json_encode($return));
        }
    }
    
    public function offersList(Request $request){
        
        $promotions = DB::table('promotions')->orderBy('discount_type','desc')->get(['discount_type','discount']);
        $return = array("message" => "", "data" => $promotions, "status_code" => 200);
        exit(json_encode($return));
        
    }
    
    public function promotionsList(Request $request){
        
        $promotions = DB::table('promotions')->orderBy('discount_type','desc')->get();
        $return = array("message" => "", "data" => $promotions, "status_code" => 200);
        exit(json_encode($return));
        
    }
    
    public function promotionsListById($id){
        
        $promotions = DB::table('promotions')->where('business_id',$id)->orderBy('discount_type','desc')->get();
        $return = array("message" => "", "data" => $promotions, "status_code" => 200);
        exit(json_encode($return));
        
    }
    
    public function promotionsList2(Request $request){
        $latitude = @$request->latitude;
        $longitude = @$request->longitude;
        
        if(isset($request->latitude) && isset($request->longitude) && !empty($latitude) && !empty($longitude)){
            $getNearbyBusinesses = $this->getNearbyBusinesses($request);
        }else{
            $getNearbyBusinesses = $this->getNearbyBusinessesMannual($request);
        }
        
        $promotions = DB::table('promotions')->orderBy('discount_type','desc')->get();
        $return = array("message" => "", "data" => $getNearbyBusinesses, "status_code" => 200);
        exit(json_encode($return));
        
    }
    
    public function getNearbyBusinessesMannual($request){
        
        $latitude = @$request->latitude;
        $longitude = @$request->longitude;
        $discount = @$request->discount;
        $category_id = @$request->category_id;
        $discount_type = @$request->discount_type;

        $businesses = DB::table("user_details");

        if(!empty($category_id)){
            $businesses->join('business_categories_linking', 'user_details.user_id', '=', 'business_categories_linking.business_id')
            ->where('business_categories_linking.category_id',$category_id);
        }


        if(!empty($discount) && !empty($discount_type)){
            $businesses = $businesses->join('promotions', 'user_details.user_id', '=', 'promotions.business_id')
            ->where('promotions.discount',$discount)
            ->where('promotions.discount_type',$discount_type);
        }
        
        if(isset($latitude)&& !empty($latitude) && isset($longitude) && !empty($longitude)){

            $businesses = $businesses->select("*", DB::raw("6371 * acos(cos(radians(" . @$latitude . "))
            * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
            + sin(radians(" .@$latitude. ")) * sin(radians(latitude))) AS distance"));
            $businesses = $businesses->having('distance', '<', 10);
            $businesses = $businesses->orderBy('distance', 'asc');
           
        }


        $businesses = $businesses->get();
        
        return $businesses;
        
    }
    
    
    public function getNearbyBusinesses($request){
        
        $latitude = @$request->latitude;
        $longitude = @$request->longitude;
        $discount = @$request->discount;
        $category_id = @$request->category_id;
        $discount_type = @$request->discount_type;

        $businesses = DB::table("user_details");

        if(!empty($category_id)){
            $businesses->join('business_categories_linking', 'user_details.user_id', '=', 'business_categories_linking.business_id')
            ->where('business_categories_linking.category_id',$category_id);
        }


        if(!empty($discount) && !empty($discount_type)){
            $businesses = $businesses->join('promotions', 'user_details.user_id', '=', 'promotions.business_id')
            ->where('promotions.discount',$discount)
            ->where('promotions.discount_type',$discount_type);
        }
        
        if(isset($latitude)&& !empty($latitude) && isset($longitude) && !empty($longitude)){

        $businesses = $businesses->select("*", DB::raw("6371 * acos(cos(radians(" . @$latitude . "))
        * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
        + sin(radians(" .@$latitude. ")) * sin(radians(latitude))) AS distance"));
        $businesses = $businesses->having('distance', '<', 10);
        $businesses = $businesses->orderBy('distance', 'asc');
       
    }

        $businesses = $businesses->get();
        
        return $businesses;
        
    }
    

    public function requestFundRaising(Request $request){
        $return = array("message" => "Thanks for submitting your request, You will be notified with an email!", "data" => "", "status_code" => 200);
        exit(json_encode($return));
    }

    public function contactUs(Request $request){
        $return = array("message" => "Thanks for submitting your request, We'll contact you soon", "data" => "", "status_code" => 200);
        exit(json_encode($return));
    }

    public function businessList(){
        $businesses = DB::table('users')->where('role_id',2)->where('is_email_verified',1)->where('is_approved',1)
        ->join('user_details', 'users.id','user_details.user_id')
        ->select('users.id','users.name','users.email','users.mobile','users.is_email_verified','users.is_phone_verified','user_details.country_id as country','user_details.state_id as state','user_details.city','user_details.address','user_details.phonecode','user_details.pincode','user_details.mobile as mobile_without_code')
        ->get();

        foreach($businesses as $key => $business){
            $business->country = User::getCountryName($business->country) ;
            $business->state = User::getstateName($business->state) ;
        }

        $return = array("message" => "", "data" => $businesses, "status_code" => 200);
        exit(json_encode($return));
    }

    
    
    
}
