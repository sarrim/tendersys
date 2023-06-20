<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BusinessProfile;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Tender;
use App\Models\Bid;
use App\Events\SaveProfileEvent;
use App\Events\SaveBusinessDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Events\SaveBusinessProfileEvent;
use App\Http\Requests\ValidatePasswordRequest;
use App\Http\Requests\UpdateBusinessProfileRequest;
use DB;

class VendorController extends Controller
{

    public function index()
    {
        $orders = '';
        $vendors = '';
        $buyers = '';
        $get_business = get_business_id();
        $order_query = OrderDetails::orderBy('created_at', 'desc');
        // $product_query = Product::orderBy('created_at', 'desc');
        $sum_earning = OrderDetails::select('order_amount');

        // dd($get_business);
        if(Auth::user()->user_type == 1){
            $orders = $order_query->get();
            // $products = $product_query->get();
            $earning = $sum_earning->sum('order_amount');
            $vendors = User::where('user_type', 2)->get();
            $buyers = User::where('user_type', 3)->get();
        }
        if(Auth::user()->user_type == 2){
            $orders = $order_query->where('vendor_id', Auth::user()->id)->get();
            // $products = $product_query->where('business_id', $get_business->id)->get();
            $earning = $sum_earning->where('business_id', $get_business->id)->sum('order_amount');
        }
        // dd($earning);
        return view('vendor.pages.dashboard', ['orders' => $orders, 'earning' => $earning, 'vendors' => $vendors, 'buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('vendor.profile');
    }

    public function update_profile(Request $request)
    {
        // dd($request);
        event(new SaveProfileEvent($request));
        return redirect()->back()->with('message', 'Profile details have been updated');
    }

    public function update_password(ValidatePasswordRequest $request)
    {
        if($this->confirmCurrentPassword($request->password)){

        }
        else{
            return redirect()->back()->with('password_error', 'You entered invalid current password');
        }
    }


    public function confirmCurrentPassword($password)
    {
        $user = User::find(Auth::user()->id);
        if($user->password == Hash::make($password)){
            return true;
        }
        else{
            return false;
        }
    }


    public function update_profile_picture(Request $request)
    {
        $user = User::find($request->user_id);

        if($request->hasFile('profile_picture')){
            // dd($request);
            if(File::exists(public_path('uploads/profile/'.$user->profile_picture))){ File::delete(public_path('uploads/profile/'.$user->profile_picture));  }
            $logo = 'logo_'.time().rand(99,9999999).'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/profile'), $logo);
            $user->profile_picture = $logo;
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile picture have been updated');
    }

    public function tenders(){
        $allTenders = Tender::with('user', 'category')->get();
        return view('vendor.pages.tender.index', ['allTenders' => $allTenders]);
    }

    public function bids(){
        $allBids = Bid::with('user', 'tender')->get();
        return view('vendor.pages.bid.index', ['allBids' => $allBids]);
    }

    public function users(){
        $allUsers = User::whereNot('user_type', 1)->get();
        return view('vendor.pages.user.index', ['allUsers' => $allUsers]);
    }



    public function business()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        return view('vendor.business', ['get_business' => $get_business]);
    }

    public function update_business(Request $request)
    {
        // event(new SaveBusinessProfileEvent($request));
        $res = BusinessProfile::updateOrCreate(
        [
            'id' => $request->business_id
        ],
        [
            'user_id' => Auth::user()->id,
            'business_name' => $request->business_name,
            'email_address' => $request->email_address,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'business_city' => $request->business_city,
            'business_address' => $request->business_address,
            'business_latitude' => $request->business_latitude,
            'business_longitude' => $request->business_longitude,
            'business_status' => $request->business_status,
            'business_profile' => $request->business_profile,
            ]
        );

        return redirect()->back()->with('message', 'Business details have been updated');
    }

    public function update_business_logo(Request $request)
    {
        $business = BusinessProfile::find($request->business_id);

        if($request->hasFile('business_logo')){
            if(File::exists(public_path('uploads/business/logo/'.$business->business_logo))){ File::delete(public_path('uploads/business/logo/'.$business->business_logo));  }
            $logo = 'logo_'.time().rand(99,9999999).'.'.$request->business_logo->extension();
            $request->business_logo->move(public_path('uploads/business/logo'), $logo);
            $business->business_logo = $logo;
            $business->save();
        }

        return redirect()->back()->with('message', 'Business logo have been updated');
    }


    public function update_user(Request $request, $id){
        $user = User::find($id);
        if($request->user_status == 1){
            $user->user_status = $request->user_status;
            $user->email_verified_at = date('Y-m-d H:i:s');
        }
        if($request->user_status == 2 || $request->user_status == 3){
            $user->user_status = $request->user_status;
            $user->email_verified_at = '';
        }

        $user->save();
        return redirect()->back();
    }


    public function orders()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $get_business = get_business_id();
        // dd($get_business);
        // $orders = Order::with('user', 'product')->where('business_id', $get_business->id)->get();
        // dd($orders);
        // $order_query = Order::with('vendor', 'product', 'details')->orderBy('date', 'desc');
        $order_query = OrderDetails::with('order', 'product', 'vendor', 'user')->whereHas('order', function($q){
            $q->orderBy('date', 'desc');
        });
        if(Auth::user()->user_type == 1){
            $orders = $order_query->get();
        }
        if(Auth::user()->user_type == 2){
            $orders = $order_query->where('vendor_id', Auth::user()->id)->get();
        }
        // dd($orders);
        return view('vendor.orders', ['orders' => $orders]);
    }

    public function order_details($id)
    {
        // $order = DB::table('orders')
        // ->join('order_details', 'order_details.order_id', 'orders.id')
        // ->join('products', 'products.id', 'orders.product_id')
        // ->join('users', 'users.id', 'orders.user_id')
        // ->where('orders.id', $id)
        // ->first();
        // dd($order);
        $order = OrderDetails::with('order', 'product', 'vendor', 'user')->whereHas('order', function($q) use($id){
            $q->where('id', $id)->orderBy('date', 'desc');
        })->first();
        return view('vendor.order_details', ['order' => $order]);
    }

    public function update_order(Request $request, $id){
        $order = Order::find($id);
        $order->vendor_status = $request->vendor_status;
        $order->save();
        return redirect()->back();
    }

    public function payment_status(Request $request){
        $admin_amount = Auth::user()->available_amount;
        $user_id = $request->get('user_id');
        $vendor_id = $request->get('vendor_id');
        $order_id = $request->get('order_id');
        $payment_status = $request->get('payment_status');
        // echo $order_id;
        // echo $payment_status;
        // dd();
        $order = Order::find($order_id);
        $order->payment_status = $request->payment_status;
        $order->save();

        if($payment_status == 2){
            $vendor = $order->vendor_id;
            $user = $order->user_id;
            $amount = $order->order_amount;

            $vendor_balance = User::where('id', $vendor_id)->first();
            $vendor_balance->available_amount = ($vendor_balance->available_amount+$amount);
            $vendor_balance->save();

            $get_admin = User::where('user_type', 1)->first();
            $admin_amount = $get_admin->available_amount-$amount;
            $get_admin->available_amount = $admin_amount;
            $get_admin->save();
        }

        if($payment_status == 3){
            $vendor = $order->vendor_id;
            $user = $order->user_id;
            $amount = $order->order_amount;

            // $vendor_balance = User::where('id', $user_id)->first();
            // $vendor_balance->available_amount+$amount;
            // $vendor_balance->save();

            $vendor_balance = User::where('id', $user_id)->first();
            $vendor_balance->available_amount = ($vendor_balance->available_amount+$amount);
            $vendor_balance->save();

            $get_admin = User::where('user_type', 1)->first();
            $admin_amount = $get_admin->available_amount-$amount;
            $get_admin->available_amount = $admin_amount;
            $get_admin->save();

        }



        return redirect()->back();
    }


    public function delete_user(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'User has been deleted successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
