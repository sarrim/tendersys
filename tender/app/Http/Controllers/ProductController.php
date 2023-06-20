<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public $business_id;
    public function __construct()
    {
        $business_id = get_business_id();
    }

    public function index()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $products_query = Product::with('category', 'subcategory', 'user')->orderBy('id', 'desc');
        if(Auth::user()->user_type == 1){
            $products = $products_query->get();
        }
        if(Auth::user()->user_type == 2){
            $products = $products_query->where('business_id', $get_business->id)->get();
        }
        // dd($products);
        return view('vendor.product.index', ['products' => $products]);
    }

    public function create()
    {
        // dd($this->business_id);
        // dd(Auth::user()->id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('vendor.product.create', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $business_id = $business->id;
        $product = new Product();
        if($request->hasFile('product_thumbnail')){
            $thumbnail = 'product_'.time().rand(99,9999999).'.'.$request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('uploads/products'), $thumbnail);
            $product->product_thumbnail = $thumbnail;
        }
        $product->user_id = Auth::user()->id;
        $product->business_id = $business_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_title = $request->product_title;
        $product->product_slug = Str::slug($request->product_title);
        $product->product_price = $request->product_price;
        $product->product_inventory = $request->product_inventory;
        $product->product_description = $request->product_description;
        $product->subtitle = $request->subtitle;
        $product->product_status = $request->product_status;
        $product->created_by = Auth::user()->id;
        $res = $product->save();
        $product_id = $product->id;

            foreach($request->file('image') as $key => $file)
            {
                // dd($request);
                $mobile_image = '';
                $product_images = new ProductImages();
                $image = 'image_'.time().rand(1,99999).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/product/images/', $image);

                $product_images->product_id = $product_id;
                $product_images->image = $image;
                $res = $product_images->save();

            }

        if($res){ return redirect('vendor/products')->with('message', 'Product has been added successfully'); }
        else{ return redirect('vendor/products')->with('message', 'Product can not be added successfully'); }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $get_product = Product::find($id);

        $product_images = ProductImages::where('product_id', $id)->get();

        return view('vendor.product.edit', ['get_product' => $get_product ,'categories' => $categories, 'subcategories' => $subcategories, 'product_images' => $product_images]);
    }


    public function update(UpdateProductRequest $request, Product $product, $id)
    {
        $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $business_id = $business->id;
        $product = Product::find($id);
        if($request->hasFile('product_thumbnail')){
            if(File::exists(public_path('uploads/products/'.$product->product_thumbnail))){ File::delete(public_path('uploads/products/'.$product->subcategory_thumbnail));  }
            $thumbnail = 'product_'.time().rand(99,9999999).'.'.$request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('uploads/products'), $thumbnail);
            $product->product_thumbnail = $thumbnail;
        }
        $product->user_id = Auth::user()->id;
        $product->business_id = $business_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_title = $request->product_title;
        $product->product_slug = Str::slug($request->product_title);
        $product->product_price = $request->product_price;
        $product->product_inventory = $request->product_inventory;
        $product->subtitle = $request->subtitle;
        $product->product_status = $request->product_status;
        $product->product_description = $request->product_description;
        $product->created_by = Auth::user()->id;
        $res = $product->save();
        if($res){ return redirect('vendor/products')->with('message', 'Product has been updated successfully'); }
        else{ return redirect('vendor/products')->with('message', 'Product can not be updated successfully'); }
    }


    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        if(File::exists(public_path('uploads/products/'.$product->product_thumbnail))){ File::delete(public_path('uploads/products/'.$product->subcategory_thumbnail));  }
        $product->delete();
        return redirect()->back();
    }

    public function save_images(Request $request)
    {
        try{
            foreach($request->file('image') as $key => $file)
            {
                // dd($request);
                $mobile_image = '';
                $product = new ProductImages();
                $image = 'image_'.time().rand(1,99999).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/product/images/', $image);

                $product->product_id = $request->product_id;
                $product->title = $request->title;
                $product->image = $image;
                $res = $product->save();

            }
            if($res){
                return redirect()->back()->with('success', 'Product Image(s) has been updated');
            }
        }
        catch(Exception $e){
            // dd($request);
            return $e->getMessage();
        }

    }

    public function delete_image($id)
    {
        $product = ProductImages::find($id);
        if(File::exists(public_path().'/uploads/product/images/'.$product->image)) { File::delete(public_path().'/uploads/product/images/'.$product->image);  }
        if(File::exists(public_path().'/uploads/product/images/'.$product->mage)) { File::delete(public_path().'/uploads/product/images/'.$product->mage);  }
        $res = $product->delete();
        if($res){
            return redirect()->back()->with('success', 'Product Image has been deleted');
        }
    }


}
