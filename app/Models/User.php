<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Response;
use App\Models\User;
use App\Models\UserVerify;
use Auth;
use Illuminate\Support\Facades\Validator;
use Hash;
use DB;
use Str;
use Mail;
use Carbon\Carbon;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'role_id',
        'address',
        'password',
        'otp',
        'otp_flag',
        'otp_time',
        'status',
        'is_phone_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
        'otp_flag',
        'otp_time',
        'company_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function loginWithPassword($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {

            $email = $request->email;
            $password = $request->password;

            $auth_data = [
                'email' => $email,
                'password' => $password
            ];


            if (Auth::attempt($auth_data)) {
                if (Auth::user()->is_email_verified == 0) {

                    DB::beginTransaction();
                    try {
                        $token = Str::random(64);

                        UserVerify::where('user_id', Auth::user()->id)->delete();
                        UserVerify::create([
                            'user_id' => Auth::user()->id,
                            'token' => $token
                        ]);

                        Mail::send('mail.signup_success', ['token' => $token], function ($message) use ($request) {
                            $message->to(Auth::user()->email);
                            $message->subject('Email Verification Mail');
                        });

                        Auth::logout();
                        DB::commit();
                        return array("message" => 'login failed. We have sent you an confirmation email again, please check your email to continue.', "data" => [], "status_code" => 204);
                    } catch (\Throwable $th) {
                        DB::rollback();
                        return array("message" => 'something went wrong in sending reverification link', "data" => [], "status_code" => 204);
                    }
                }
                $data = $this->fetch_user_details(Auth::id());
                $data->subscription = $this->checkSubscription(Auth::id());
                return array('message' => 'login Successfully',"data" => $data, "status_code" => 200);
            } else {
                return array("message" => "Email Or Password Not Matched", "data" => [], "status_code" => 204);
            }
        }
    }

    function sendOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|exists:user_details',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {
            $mobile = $request->mobile;
            $phonecode = $request->phonecode;
            $this->where('mobile', $phonecode.$mobile)->update([
                'otp' => otp(4),
                'otp_flag' => 0,
                'otp_time' => date('Y-m-d H:i:s'),
            ]);
            return array('message' => 'Otp Sent Successfully', 'data' => [], 'status_code' => 200);
        }
    }

    public function verifyOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|exists:user_details',
            'otp' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {
            $otp = $request->otp;
            $mobile = $request->mobile;
            $phonecode = $request->phonecode;

            $matchOtp = $this->where('mobile', $phonecode.$mobile)->where('otp', $otp)->first();
            
            if (@$matchOtp && !empty($matchOtp)) {
                $db_otp = $matchOtp->otp;
                $otp_time = $matchOtp->otp_time;
                $otp_flag = $matchOtp->otp_flag;
                $otpTimestamp = explode(' ', $otp_time);
                $currentTimestamp = explode(' ', date('Y-m-d H:i:s'));
                $currentdate = $currentTimestamp[0];
                $otpdate = $otpTimestamp[0];
                if ($otp_flag == 1) {
                    return array('message' => 'OTP already used, please try again', "data" => [], "status_code" => 204);
                }
                if ($otpdate == $currentdate) {
                    $datetime1 = strtotime($otp_time);
                    $datetime2 = strtotime(date('Y-m-d H:i:s'));
                    $interval  = abs($datetime2 - $datetime1);
                    $minutes   = round($interval / 60);
                    if ($minutes > 15) {
                        return array('message' => 'OTP is expired, please try again', "data" => [], "status_code" => 204);
                    } else {
                        $data = array(
                            'otp_flag' => 1,
                            'is_phone_verified' =>1
                        );
                        self::where('mobile', '=', $phonecode.$mobile)->update($data);
                        $data = $this->fetch_user_details($matchOtp->id);
                        $result = [
                            'message' => 'OTP verified Successfully',
                            'data' => $data,
                            'status' => 200
                        ];
                        return $result;
                    }
                } else {
                    $result = [
                        'status' => 204,
                        'message' => 'OTP is expired, please try again',
                    ];
                    return $result;
                }
            } else {
                $result = [
                    'status' => 204,
                    'message' => 'OTP is not valid, please try again',
                ];
                return $result;
            }
        }
    }

    public function signup($request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {
            $name = $request->name;
            $email = $request->email;
            $address = $request->address;
            $mobile = $request->mobile;
            $password = $request->password;


            DB::beginTransaction();
            try {
                $data = [
                    'name' => $name,
                    'role_id' => 3,
                    'email' => $email,
                    'mobile' => $request->phonecode.$mobile,
                    'status' => 0,
                    'password' => Hash::make($password),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
       

                $user = User::create($data)->toArray();
                $data2 = [
                    'user_id'=>$user['id'],
                    'country_id'=>$request->country_id,
                    'state_id'=>$request->state_id,
                    'city' =>$request->city,
                    'phonecode'=>$request->phonecode,
                    'address' =>$request->address,
                    'mobile' =>$request->mobile,
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                DB::table('user_details')->insert($data2);
                $token = Str::random(64);

                UserVerify::where('user_id', $user['id'])->delete();

                $fetch_user_details = $this->fetch_user_details($user['id']);
                UserVerify::create([
                    'user_id' => $user['id'],
                    'token' => $token
                ]);

                Mail::send('mail.signup_success', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Email Verification Mail');
                });

                DB::commit();
                return array("message" => "We have sent you an email verification email. Check email to complete the sign up process", "data" => $fetch_user_details, "status_code" => 200);
            } catch (\Exception $ex) {
                DB::rollback();
                return array("message" => 'Something went wrong. Please try again', "data" => [], "status" => 204);
            }
        }
    }

    function verifyEmail($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        // dd($verifyUser);
        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $token_time = strtotime($verifyUser->created_at);
                $current_time = strtotime(date('Y-m-d H:i:s'));
                $diff_min =  round(abs($current_time - $token_time) / 60, 2);
                if ($diff_min > 15) {
                    return array("message" => 'Link is expired', "data" => [], "status" => 204);
                }

                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->status = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
                $verifyUser->delete();
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return array("message" => $message, "data" => [], "status" => 200);
    }

    function fetch_user_details($user_id){
        $user_data = DB::table('users')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->where('users.id', $user_id)
        ->select('users.id','users.name','users.email','users.mobile','users.is_email_verified','users.is_phone_verified','user_details.country_id as country','user_details.state_id as state','user_details.city','user_details.address','user_details.phonecode','user_details.mobile as mobile_without_code')
        ->first();

        $user_data->country  = $this->getCountryName($user_data->country);
    
        $user_data->state  = $this->getstateName($user_data->state);

        return $user_data;
    }

    function checkSubscription($user_id){
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
        return  $subObj;


    }

    function getCountryName($country_id){
        $country = DB::table('countries')->where('id',$country_id)->first(['id','name']);
        return @$country;
    }

    function getstateName($state_id){
        $state = DB::table('states')->where('id',$state_id)->first(['id','name']);
        return @$state;
    }

    function sendForgetPasswordLink($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {

            $token = Str::random(64);

            DB::table('password_resets')->where('email', $request->email)->delete();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('mail.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return array("message" =>  'We have e-mailed your password reset link!', "data" => [], "status" => 200);
        }
    }

    function changePassword($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return array("data" => $data, "status_code" => 204);
        } else {

            $updatePassword = DB::table('password_resets')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$updatePassword) {
                return array("message" => 'Invalid token!', "data" => [], "status" => 204);
            }

            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return array("message" => 'Your password has been changed!', "data" => [], "status" => 200);
        }
    }
}
