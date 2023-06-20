<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $subcategories_query = SubCategory::with('category')->orderBy('id', 'desc');
        // $subcategories = SubCategory::with('category')->where('business_id', $get_business->id)->orderBy('id', 'desc')->get();
        // if(Auth::user()->user_type == 1){
            $subcategories = $subcategories_query->get();
        // }
        // if(Auth::user()->user_type == 2){
        //     $subcategories = $subcategories_query->where('business_id', $get_business->id)->get();
        // }

        return view('vendor.subcategory.index', ['subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('vendor.subcategory.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        // $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $subcategory = new SubCategory();
        if($request->hasFile('subcategory_thumbnail')){
            $thumbnail = 'subcategory_'.time().rand(99,9999999).'.'.$request->subcategory_thumbnail->extension();
            $request->subcategory_thumbnail->move(public_path('uploads/subcategories'), $thumbnail);
            $subcategory->subcategory_thumbnail = $thumbnail;
        }
        // $subcategory->business_id = $business_id;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name);
        $subcategory->subcategory_status = $request->subcategory_status;
        $res = $subcategory->save();
        if($res){ return redirect('admin/subcategories')->with('message', 'Sub Category has been added successfully'); }
        else{ return redirect('admin/subcategories')->with('message', 'Sub Category can not be added successfully'); }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory, $id)
    {
        $categories = Category::all();
        $get_subcategory = SubCategory::find($id);
        // dd($get_subcategory);
        return view('vendor.subcategory.edit', ['get_subcategory' => $get_subcategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory, $id)
    {
        // $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $subcategory = SubCategory::find($id);
        if($request->hasFile('subcategory_thumbnail')){
            if(File::exists(public_path('uploads/subcategories/'.$subcategory->subcategory_thumbnail))){ File::delete(public_path('uploads/subcategories/'.$subcategory->subcategory_thumbnail));  }
            $thumbnail = 'subcategory_'.time().rand(99,9999999).'.'.$request->subcategory_thumbnail->extension();
            $request->subcategory_thumbnail->move(public_path('uploads/subcategories'), $thumbnail);
            $subcategory->subcategory_thumbnail = $thumbnail;
        }
        // $subcategory->business_id = $business_id;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name);
        $subcategory->subcategory_status = $request->subcategory_status;
        $res = $subcategory->save();
        if($res){ return redirect('admin/subcategories')->with('message', 'Sub Category has been added successfully'); }
        else{ return redirect('admin/subcategories')->with('message', 'Sub Category can not be added successfully'); }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory, $id)
    {
        $subcategory = SubCategory::find($id);
        $product = Product::where('subcategory_id', $id)->first();
        if($product){
            // dd('test');
            Product::where('subcategory_id', $id)->delete();
        }
        if(File::exists(public_path('uploads/subcategories/'.$subcategory->subcategory_thumbnail))){ File::delete(public_path('uploads/subcategories/'.$subcategory->subcategory_thumbnail));  }
        $subcategory->delete();
        return redirect()->back();
    }
}
