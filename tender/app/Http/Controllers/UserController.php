<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\BusinessProfile;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Tender;
use App\Models\Category;
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
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::where('user_id', Auth::user()->id)->get();
        $messages = Message::where('from_id', Auth::user()->id)->orWhere('to_id', Auth::user()->id)->get();
        return view('website.user-dashboard', ['tenders' => $tenders, 'messages' => $messages]);
    }

    public function login(Request $request)
    {
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

        return view('website.login');
    }

    public function register()
    {
        return view('website.register');
    }


    public function profile()
    {
        return view('website.profile');
    }


    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->about = $request->about;
        if($request->hasFile('profile_picture')){
            if(File::exists(public_path('uploads/profile/'.$user->profile_picture))){ File::delete(public_path('uploads/profile/'.$user->profile_picture));  }
            $profile = 'profile_'.time().rand(99,9999999).'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/profile'), $profile);
            $user->profile_picture = $profile;
        }

        $user->save();
        return redirect()->back()->with('message', 'Profile details have been updated');
    }

    public function change_password()
    {
        return view('website.change-password');
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
            if(File::exists(public_path('uploads/profile/'.$user->profile_picture))){ File::delete(public_path('uploads/profile/'.$user->profile_picture));  }
            $logo = 'logo_'.time().rand(99,9999999).'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/profile'), $logo);
            $user->profile_picture = $logo;
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile picture have been updated');
    }


    public function tenders(){
        $tenders = Tender::where('user_id', Auth::user()->id)->get();
        return view('website.tenders', ['tenders' => $tenders]);
    }

    public function bids(){
        $bids = Bid::with('tender')->where('user_id', Auth::user()->id)->get();
        return view('website.bids', ['bids' => $bids]);
    }

    public function add_tender()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        return view('website.add_tender', ['get_business' => $get_business, 'categories' => $categories]);
    }

    public function apply_for_tender(Request $request, $id)
    {
        $tender = Tender::find($id);
        if($tender->user_id == Auth::user()->id){
            return redirect()->back()->with('message', 'You can not bid on your tender');
        }

        $bid = new Bid;
        $bid->user_id = Auth::user()->id;
        $bid->tender_id = $id;
        $bid->bid_title = $request->bid_title;
        $bid->timeframe = $request->timeframe;
        $bid->bid_offer = $request->bid_offer;
        $bid->bid_description = $request->bid_description;
        if($request->hasFile('bid_attachment')){
            $attachment = 'bid_'.time().rand(99,9999999).'.'.$request->bid_attachment->extension();
            $request->bid_attachment->move(public_path('uploads/bids/attachment'), $attachment);
            $bid->bid_attachment = $attachment;
        }

        $bid->save();
        return redirect()->back()->with('message', 'Bid has been posted successfully');
    }

    public function save_tender(Request $request)
    {
        $tender = new Tender;
        $tender->user_id = Auth::user()->id;
        $tender->category_id = $request->category_id;
        $tender->tender_title = $request->tender_title;
        $tender->tender_no = 'T#'.date('Y').time();
        $tender->tender_slug = Str::slug($request->tender_title);
        $tender->tender_description = $request->tender_description;
        $tender->tender_amount = $request->tender_amount;
        $tender->tender_keywords = $request->tender_keywords;
        $tender->tender_deadline = $request->tender_deadline;
        $tender->tender_location = $request->tender_location;
        $tender->tender_country = $request->tender_country;
        $tender->tender_city = $request->tender_city;
        if($request->hasFile('tender_attachment')){
            $attachment = 'attachment_'.time().rand(99,9999999).'.'.$request->tender_attachment->extension();
            $request->tender_attachment->move(public_path('uploads/tenders/attachment'), $attachment);
            $tender->tender_attachment = $attachment;
        }

        $tender->save();
        return redirect()->back()->with('message', 'Tender has been published successfully');
    }

    public function get_tender(Request $request, $id){
        $tender = Tender::find($id);
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        return view('website.edit_tender', ['tender' => $tender, 'categories' => $categories]);
    }

    public function edit_tender(Request $request, $id){
        $tender = Tender::find($id);
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        return view('website.edit_tender', ['tender' => $tender, 'categories' => $categories]);
    }



    public function update_tender(Request $request, $id)
    {
        $tender = Tender::find($id);
        $tender->user_id = Auth::user()->id;
        $tender->category_id = $request->category_id;
        $tender->tender_title = $request->tender_title;
        $tender->tender_slug = Str::slug($request->tender_title);
        $tender->tender_description = $request->tender_description;
        $tender->tender_amount = $request->tender_amount;
        $tender->tender_keywords = $request->tender_keywords;
        $tender->tender_deadline = $request->tender_deadline;
        $tender->tender_location = $request->tender_location;
        $tender->tender_country = $request->tender_country;
        $tender->tender_city = $request->tender_city;
        $tender->tender_requirements = $request->tender_requirements;
        if($request->hasFile('tender_attachment')){
            if(File::exists(public_path('uploads/tenders/attachment/'.$tender->tender_attachment))){ File::delete(public_path('uploads/tenders/attachment/'.$tender->tender_attachment));  }
            $attachment = 'attachment_'.time().rand(99,9999999).'.'.$request->tender_attachment->extension();
            $request->tender_attachment->move(public_path('uploads/tenders/attachment'), $attachment);
            $tender->tender_attachment = $attachment;
        }

        $tender->save();
        return redirect()->back()->with('message', 'Tender has been published successfully');
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

    public function users()
    {
        // $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $users = User::with('business')->get();
        // dd($users);
        return view('vendor.users', ['users' => $users]);
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

    public function delete_user(Request $request){
        $user = User::find(Auth::user()->id);
        $user->delete();
        return redirect('logout');
    }


    public function message()
    {
        $message_users = Message::with(['from_user' => function($query){
            $query->select('id');
            // $query->groupBy('id');
        }], 'to_user')->where('from_id', Auth::user()->id)->orWhere('to_id', Auth::user()->id)->get();
        return view('website.messages', ['message_users' => $message_users]);
    }

    public function get_messages(Request $request)
    {
        $user_id = $request->user_id;
        // dd($user_id);
        $get_messages = Message::with('from_user', 'to_user')->where('from_id', $user_id)->orWhere('to_id', $user_id)->get();
        return view('website.get_messages', ['get_messages' => $get_messages, 'user_id' => $user_id]);
    }


    public function send_message(Request $request)
    {
        if($request->user_id == Auth::user()->id){
            return redirect()->back()->with('message', 'You can not send message to yourself');
        }
        $message = new Message();
        $message->from_id = Auth::user()->id;
        $message->to_id = $request->user_id;
        $message->message_description = $request->message;
        $message->save();

        return redirect()->back()->with('message', 'Your message has been sent');
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


    // public function delete_user(Request $request, $id){
    //     $user = User::find($id);
    //     $user->delete();
    //     return redirect()->back()->with('message', 'User has been deleted successfully');
    // }


}
