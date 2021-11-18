<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;

class BusinessMiddleware
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == '2') {
            if (Auth::user()->is_email_verified == 1) {
                if (Auth::user()->is_approved == 1) {
                    return $next($request)->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                } elseif (Auth::user()->is_approved == 2) {
                    $msg = array('title' => 'Rejected!', 'text' => 'Account rejected by admin!');
                    return redirect('/login')->with('msg-error', $msg);
                }
                else {
                    return redirect('/login')->with('approved_error', 'Not approved.');
                }
            } else {
                $user_data = DB::table('users_verify')->where('user_id', Auth::user()->id)->first();
                $token = $user_data->token;
                Mail::send('mail.signup_success', ['token' => $token], function ($message) use ($request) {
                    $message->to(Auth::user()->email);
                    $message->subject('Email Verification Mail');
                });
                $msg = array('title' => 'Email not Verified!', 'text' => 'We have sent you an e-mail. Please check your email and verify through e-mail to complete sign-up process.');
                return redirect('/login')->with('msg-error', $msg);
            }
        } else {
            return redirect('/login')->with('error','You must login first!');
        }
    }
}
