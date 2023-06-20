<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $categories_query = Category::orderBy('id', 'desc');
        // $categories = Category::where('business_id', $get_business->id)->orderBy('id', 'desc')->get();
        // if(Auth::user()->user_type == 1){
            $categories = $categories_query->get();
        // }
        // if(Auth::user()->user_type == 2){
        //     $categories = $categories_query->where('business_id', $get_business->id)->get();
        // }

        return view('vendor.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $category = new Category();
        if($request->hasFile('category_thumbnail')){
            $thumbnail = 'thumbnail_'.time().rand(99,9999999).'.'.$request->category_thumbnail->extension();
            $request->category_thumbnail->move(public_path('uploads/categories'), $thumbnail);
            $category->category_thumbnail = $thumbnail;
        }
        // $category->business_id = $business_id;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->category_status = $request->category_status;
        $res = $category->save();
        if($res){ return redirect('admin/categories')->with('message', 'Category has been added successfully'); }
        else{ return redirect('admin/categories')->with('message', 'Category can not be added successfully'); }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $get_category = Category::find($id);
        return view('vendor.category.edit', ['get_category' => $get_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category, $id)
    {
        $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $category = Category::find($id);
        if($request->hasFile('category_thumbnail')){
            if(File::exists(public_path('uploads/categories/'.$category->category_thumbnail))){ File::delete(public_path('uploads/categories/'.$category->category_thumbnail));  }
            $thumbnail = 'thumbnail_'.time().rand(99,9999999).'.'.$request->category_thumbnail->extension();
            $request->category_thumbnail->move(public_path('uploads/categories'), $thumbnail);
            $category->category_thumbnail = $thumbnail;
        }
        // $category->business_id = $business_id;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->category_status = $request->category_status;
        $res = $category->save();
        if($res){ return redirect('admin/categories')->with('message', 'Category has been updated successfully'); }
        else{ return redirect('admin/categories')->with('message', 'Category can not be updated successfully'); }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        // dd($id);
        $subcat = SubCategory::where('category_id', $id)->first();
        $product = Product::where('category_id', $id)->first();
        if($subcat){
            SubCategory::where('category_id', $id)->delete();
        }
        if($product){
            Product::where('category_id', $id)->delete();
        }
        $category = Category::find($id);
        if(File::exists(public_path('uploads/categories/'.$category->category_thumbnail))){ File::delete(public_path('uploads/categories/'.$category->category_thumbnail));  }
        $category->delete();
        return redirect()->back();
    }
}
