<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->email_verified_at){
            if(Auth::user()->user_type == 2)
            {
                return redirect('vendor/login')->with('message', 'Please verify your account first');
            }
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/login')->with('message', 'Please verify your account first');
            }
        }
        else{
            // dd(Auth::user());
            // return redirect('login')->with('message', 'Please verify your account first');
            return $next($request);
        }
    }
}
