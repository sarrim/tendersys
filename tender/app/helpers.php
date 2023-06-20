<?php

use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;

    function get_business_id(){
        if(Auth::user()){
            $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
            return $get_business;
        }
    }
