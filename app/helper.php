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
