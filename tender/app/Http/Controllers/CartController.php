<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if(Auth::user()->user_type == 1){
            return redirect()->back()->with('message', 'Admin can not add to cart or view cart');
        }

        if(Auth::user()->id == $request->get('u')){
            return redirect()->back()->with('message', 'Vendor can not purchase his own product');
        }

        // dd($request->get('u'));

        $product_id = $request->get('id');
        $user_id = Auth::user()->id;
        $quantity = 0;

        $verify_cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->where('business_id', $request->get('v'))->first();

        if(!empty($verify_cart)){
            $quantity = $verify_cart->quantity;
        }
        // $cart = new Cart();
        // $cart->user_id = $user_id;
        // $cart->business_id = $request->get('v');
        // $cart->product_id = $product_id;
        // $cart->quantity = 1;
        // $cart->amount = $request->get('s');
        // $res = $cart->save();
        $cart = Cart::updateOrCreate([
            'user_id' => $user_id, 
            'vendor_id' => $request->get('u'),
            'product_id' => $product_id,
            'amount' => $request->get('p'),
            'business_id' => $request->get('v'),
        ],
            ['quantity' => $quantity+1]
        );

        if($cart){
            return redirect()->back()->with('message', 'Product has been added to cart');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function view(Cart $cart)
    {
        if(Auth::user()->user_type == 1){
            return redirect()->back()->with('message', 'Admin can not add to cart or view cart');
        }
        $categories = Category::all();
        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('website.cart', ['categories' => $categories, 'cart' => $cart]);
    }

    public function remove_item($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Item has been removed from cart');
    }


    public function checkout(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required',
            'contact' => 'required',
            'shipping_address' => 'required',
        ]);

        $get_user = User::find(Auth::user()->id);
        $available_amount = $get_user->available_amount;
        $billed_aomount = $request->billed_aomount;
        // echo $billed_aomount; echo '<br />'; echo $available_amount;
        // dd();
        if($available_amount < $billed_aomount){
            return redirect()->back()->with('message', 'You do not have sufficient balance to confirm order');
        }
        // else{
        //     $amount = ($available_amount - ($c->quantity * $c->amount));
        // }

        $cart = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cart);
        $order_no = rand(100000,999999);
       
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->order_no = $order_no;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->contact = $request->contact;
            $order->card_number = $request->card_number;
            $order->card_title = $request->card_title;
            $order->exp_year = $request->exp_year;
            $order->exp_month = $request->exp_month;
            $order->cvc = $request->cvc;
            $order->shipping_address = $request->shipping_address;

            $order->save();

            $order_id = $order->id;
            $amount = 0;
        foreach($cart as $c){

            $product = Product::find($c->product_id);
            $product->product_inventory = ($product->product_inventory - $c->quantity);
            $product->save();

            $amount+=$c->quantity*$c->amount;
            DB::table('order_details')->insert([
                'user_id' => Auth::user()->id,
                'order_id' => $order_id,
                'product_id' => $c->product_id,
                'vendor_id' => $c->vendor_id,
                'business_id' => $c->business_id,
                'quantity' => $c->quantity,
                'amount' => $c->amount,
                'order_amount' => ($c->quantity*$c->amount),                
            ]);
        }

        $get_order = Order::find($order_id);
        $get_order->order_amount = $amount;
        $get_order->save();

        $get_user = User::where('id', Auth::user()->id)->first();
        $get_user->available_amount = ($get_user->available_amount-$amount);
        // $get_user->available_amount = $user_amount;
        if($request->save_card_info){
            $get_user->card_number = $request->card_number;
            $get_user->card_title = $request->card_title;
            $get_user->exp_year = $request->exp_year;
            $get_user->exp_month = $request->exp_month;
            $get_user->cvc = $request->cvc;
        }
        $get_user->save();

        $get_admin = User::where('user_type', 1)->first();
        $get_admin->available_amount = ($get_admin->available_amount+$amount);
        // $get_admin->available_amount = $admin_amount;
        $get_admin->save();


        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->back()->with('order_message', 'Order has been placed, You will be contacted by concerned person');
    }

    public function my_orders()
    {
        $categories = Category::all();
        $cart = OrderDetails::with('order', 'product', 'vendor')->whereHas('order', function($q){
            $q->where('user_id', Auth::user()->id)->orderBy('date', 'desc');
        })->get();
        // dd($cart);
        return view('website.my_orders', ['categories' => $categories, 'cart' => $cart]);
    }

    public function change_status(Request $request, $id)
    {
        // $cart = Order::with('product')->where('user_id', Auth::user()->id)->get();
        $cart = Order::find($id);
        $cart->order_status = $request->get('order_status');
        $cart->save();
        return redirect()->back()->with('order_message', 'Order status has been updated.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
