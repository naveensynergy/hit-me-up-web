<?php
function otp($digits)
{
    $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    $otp = 1234;
    return $otp;
}

// Get current time
function getCurrentDate(){
    date_default_timezone_set('Asia/Kolkata');
    $timestamp=date('Y-m-d');
    return $timestamp;
}

//Get catogory name
function getCategoryName($category_id){
    $categories = DB::table('business_categories')->where('id', $category_id)->first();
    $category_name = $categories->category_name;
    return $category_name;
}

//Get country name
function getCountryName($country_id){
    $countries = DB::table('countries')->where('id', $country_id)->first();
    $country_name = $countries->name;
    return $country_name;
}

//Get state name
function getStateName($state_id){
    $states = DB::table('states')->where('id', $state_id)->first();
    $state_name = $states->name;
    return $state_name;
}

//Get user name
function getUserName($user_id){
    $users = DB::table('users')->where('id', $user_id)->first();
    $user_name = $users->name;
    return $user_name;
}
