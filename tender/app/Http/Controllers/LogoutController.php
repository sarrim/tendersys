<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        $redirect = '/';
        if(Auth::user()->user_type == 1) {  $redirect = 'admin/login'; }
        if(Auth::user()->user_type == 2) {  $redirect = 'vendor/login'; }
        if(Auth::user()->user_type == 3) {  $redirect = 'login'; }
        Session::flush();

        Auth::logout();

        return redirect($redirect);
    }
}
