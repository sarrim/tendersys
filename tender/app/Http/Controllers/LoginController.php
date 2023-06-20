<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BusinessProfile;
use Hash;
use Mail;
use Exception;
use Str;

class LoginController extends Controller
{

    public function index(Request $request){
        // dd($request);
        if(Auth::user()){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            if(Auth::user()->user_type == 2){
                return redirect('vendor/dashboard');
            }
            if(Auth::user()->user_type == 3){
                return redirect('user/dashboard');
            }
        }

        if(($request->get('token'))){
            $user = User::where('remember_token', $request->get('token'))->first();

            if($user->email_verified_at){
                return redirect('login')->with('message', 'You have already verified account');
            }

            if(!$user){
                return redirect('login')->with('message', 'You have invalid token please verify again');
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
        }

        return view('auth.auth-login-basic');
    }

    public function admin_login(Request $request){
        // dd($request);
        if(Auth::user()){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            if(Auth::user()->user_type == 2){
                return redirect('vendor/dashboard');
            }
            if(Auth::user()->user_type == 3){
                return redirect('user/dashboard');
            }
        }

        if(($request->get('token'))){
            $user = User::where('remember_token', $request->get('token'))->first();

            if($user->email_verified_at){
                return redirect('login')->with('message', 'You have already verified account');
            }

            if(!$user){
                return redirect('login')->with('message', 'You have invalid token please verify again');
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
        }

        return view('vendor.index');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->back()
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if(empty($user->email_verified_at)){
            return redirect()->back()->with('message', 'You have not verified your email');
        }
        // if(!$user){
        //     $user = User::where('name', $request->name)->where('email', $request->email)->first();
        //     if($user){
        //         Auth::login($user);
        //         return $this->authenticated($request, $user);
        //     }
        // }

        Auth::login($user);
        return $this->authenticated($request, $user);
    }


    public function register($value='')
    {
        return view('auth.auth-register-basic');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username|min:3|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $rand = Str::random(60);

        $res = User::create([
            'username' => $request->username,
            'email' => $request->email,
            // 'email_verified_at' => ($request->user_type == 3 ? date("Y-m-d H:i:s") : ''),
            'password' => Hash::make($request->password),
            'clear_password' => $request->password,
            'user_type' => 3,
            'user_status' => 2,
            'remember_token' => $rand,
            'contact' => $request->contact,
            'address' => $request->address,
        ])->id;

        $res = BusinessProfile::create([
            'user_id' => $res,
            'business_name' => $request->username,
        ]);

        $data = array('name'=>$request->username, 'email'=>$request->email, 'token' => $rand);
        Mail::send('website.welcome_mail', $data, function($message) use($data) {
             $message->to($data['email'], 'Tender Marketplace')->subject
                ('Account verification email');
             $message->from('forbesamanda341@gmail.com','Ecommerce');
        });



        $mgs = '';
        $redirect = '';
        if($request->user_type == 1){
            $redirect = 'admin/dashboard';
        }
        if($request->user_type == 2){
            $redirect = 'vendor/login';
        }
        if($request->user_type == 3){
            $redirect = 'user/login';
        }
        if($res && $request->user_type == 2){
            return redirect($redirect)->with('message', 'Your account has been created. We have sent verification email to your mail. Please verify your account');
        }
        if($res && $request->user_type == 3){
            return redirect($redirect)->with('message', 'Your account has been created. We have sent verification email to your mail. Please verify your account');
        }

    }

    protected function authenticated(Request $request, $user)
    {
        // dd($user->user_type);
        $redirect = '/';
        if($user->user_type == 1){  $redirect = 'admin/dashboard'; }
        if($user->user_type == 2){  $redirect = 'vendor/dashboard'; }
        if($user->user_type == 3){  $redirect = '/'; }
        return redirect()->intended($redirect);
    }



}
