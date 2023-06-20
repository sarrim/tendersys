<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tender;
use App\Models\Comment;
use App\Models\SaveTender;
use App\Models\Subscription;
use App\Models\Contact;
use App\Models\OrderDetails;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('search');
        $categories = Category::where('category_status',1)->limit(5)->get();
        $query = Tender::where('tender_status',1);
        // $query = DB::table('tenders')
        // ->join('categories', 'categories.id', 'tenders.category_id');
        if($request->get('tender_title')){
            $query->where('tender_title', 'LIKE', '%'.$request->get('tender_title').'%');
            $query->orWhere('tender_keywords', 'LIKE', '%'.$request->get('tender_title').'%');
        }

        if($request->get('category')){
            // $query->where('tender_location', 'LIKE', '%'.$request->get('tender_location').'%');
            $query->where('category_id', $request->get('category'));
        }
        
        $tenders = $query->orderBy('tenders.id', 'desc')->get();
        $locations = Location::where('location_status',1)->get();
        return view('website.index', ['categories' => $categories, 'locations' => $locations, 'tenders' => $tenders ]);
    }

    public function categories(Request $request)
    {
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        $locations = Location::where('location_status',1)->get();
        $tenders = Tender::where('tender_status',1)->get();
        return view('website.categories', ['categories' => $categories, 'locations' => $locations, 'tenders' => $tenders ]);
    }

    public function category_tenders(Request $request, $slug)
    {
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        $category = Category::withCount('tenders')->where('category_slug',$slug)->first();
        $category_id = $category->id;
        $locations = Location::where('location_status',1)->get();
        $tenders = Tender::where('tender_status',1)->where('category_id', $category_id)->get();
        return view('website.category_tenders', ['categories' => $categories, 'locations' => $locations, 'tenders' => $tenders ]);
    }

    public function tenders(Request $request)
    {
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        $locations = Location::where('location_status',1)->get();
        $tenders = Tender::where('tender_status',1)->get();
        return view('website.all_tenders', ['categories' => $categories, 'locations' => $locations, 'tenders' => $tenders ]);
    }

    public function tender_detail(Request $request, $slug)
    {
        $categories = Category::withCount('tenders')->where('category_status',1)->get();
        $locations = Location::where('location_status',1)->get();
        $tender = Tender::with('user', 'category')->where('tender_status',1)->where('tender_slug', $slug)->first();
        $related_tenders = Tender::with('user')->where('tender_status',1)->where('category_id', $tender->category_id)->get();
        $comments = Comment::where('tender_id',$tender->id)->get();
        return view('website.tender_detail', ['categories' => $categories, 'locations' => $locations, 'tender' => $tender, 'related_tenders' => $related_tenders, 'comments' => $comments ]);
    }

    public function save_comment(Request $request)
    {
        $comment = new Comment;
        $comment->tender_id = $request->tender_id;
        $comment->full_name = $request->full_name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;

        $comment->save();
        return redirect()->back()->with('message', 'Comment has been posted successfully');
    }


    public function save_tender(Request $request, $id)
    {
        $find = Tender::find($id);
        $user_id = $find->user_id;
        if($user_id == Auth::user()->id){
            return redirect()->back()->with('message', 'You can not save your own tender');
        }
        $subs = new SaveTender();
        $subs->user_id = Auth::user()->id;
        $subs->tender_id = $id;
        $subs->saved_date = date('Y-m-d H:i:s');
        $subs->save();

        return redirect()->back();
    }

    public function about_us(Request $request){
        return view('website.about-us');
    }

    public function contact(Request $request){
        return view('website.contact');
    }

    public function faq(Request $request){
        return view('website.faq');
    }

    public function privacy(Request $request){
        return view('website.privacy');
    }

    public function subscribe(Request $request)
    {
        $subs = new Subscription();
        $subs->email = $request->email;
        $subs->date = date('Y-m-d H:i:s');
        $subs->save();

        return redirect()->back()->with('message', 'You have been subscribed for email notifications');
    }

    public function save_contact(Request $request)
    {
        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back();
    }


    public function product_detail($slug)
    {
        $categories = Category::where('category_status',1)->get();
        $products = Product::with('category')->where('product_status', 1)->orderBy('id', 'desc')->get();

        $product_detail = Product::where('product_slug', $slug)->where('product_status', 1)->first();
        $product_images = ProductImages::where('product_id', $product_detail->id)->get();
        // dd($product_detail);
        $business = BusinessProfile::where('id', $product_detail->business_id)->first();
        $sold_quantity = OrderDetails::select('quantity')->where('product_id', $product_detail->id)->sum('quantity');
        // echo $product_detail->id;
        // dd($sold_quantity);
        return view('website.product_detail', ['product_detail' => $product_detail,'categories' => $categories, 'products' => $products, 'product_images' => $product_images, 'business' => $business, 'sold_quantity' => $sold_quantity ]);
    }


    public function login()
    {
        $categories = Category::where('category_status',1)->get();
        return view('website.login', ['categories' => $categories]);
    }

    public function register()
    {
        $categories = Category::where('category_status',1)->get();
        return view('website.register', ['categories' => $categories]);
    }

    public function my_profile()
    {
        $categories = Category::where('category_status',1)->get();
        return view('website.my_profile', ['categories' => $categories]);
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->shipping_address;
        $user->card_number = $request->card_number;
        $user->card_title = $request->card_title;
        $user->exp_year = $request->exp_year;
        $user->exp_month = $request->exp_month;
        $user->cvc = $request->cvc;

        $user->save();
        return redirect()->back()->with('message', 'Profile has been updated');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recharge_balance(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->available_amount = ($user->available_amount+$request->get('amount'));
        $user->save();
        return redirect()->back()->with('order_message','Your acccount has been recharged');
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
