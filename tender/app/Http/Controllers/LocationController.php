<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        $locations_query = Location::orderBy('id', 'desc');
        // $locations = Location::where('business_id', $get_business->id)->orderBy('id', 'desc')->get();
        // if(Auth::user()->user_type == 1){
            $locations = $locations_query->get();
        // }
        // if(Auth::user()->user_type == 2){
        //     $locations = $locations_query->where('business_id', $get_business->id)->get();
        // }

        return view('vendor.location.index', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $location = new Location();
        if($request->hasFile('location_thumbnail')){
            $thumbnail = 'thumbnail_'.time().rand(99,9999999).'.'.$request->location_thumbnail->extension();
            $request->location_thumbnail->move(public_path('uploads/locations'), $thumbnail);
            $location->location_thumbnail = $thumbnail;
        }
        // $location->business_id = $business_id;
        $location->location_name = $request->location_name;
        $location->location_slug = Str::slug($request->location_name);
        $location->location_status = $request->location_status;
        $res = $location->save();
        if($res){ return redirect('admin/locations')->with('message', 'Location has been added successfully'); }
        else{ return redirect('admin/locations')->with('message', 'Location can not be added successfully'); }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location, $id)
    {
        $get_location = Location::find($id);
        return view('vendor.location.edit', ['get_location' => $get_location]);
    }

    public function update(Request $request, Location $location, $id)
    {
        $business = BusinessProfile::where('user_id', Auth::user()->id)->first();
        // $business_id = $business->id;
        $location = Location::find($id);
        if($request->hasFile('location_thumbnail')){
            if(File::exists(public_path('uploads/locations/'.$location->location_thumbnail))){ File::delete(public_path('uploads/locations/'.$location->location_thumbnail));  }
            $thumbnail = 'thumbnail_'.time().rand(99,9999999).'.'.$request->location_thumbnail->extension();
            $request->location_thumbnail->move(public_path('uploads/locations'), $thumbnail);
            $location->location_thumbnail = $thumbnail;
        }
        // $location->business_id = $business_id;
        $location->location_name = $request->location_name;
        $location->location_slug = Str::slug($request->location_name);
        $location->location_status = $request->location_status;
        $res = $location->save();
        if($res){ return redirect('admin/locations')->with('message', 'Location has been updated successfully'); }
        else{ return redirect('admin/locations')->with('message', 'Location can not be updated successfully'); }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location, $id)
    {
        $location = Location::find($id);
        if(File::exists(public_path('uploads/locations/'.$location->location_thumbnail))){ File::delete(public_path('uploads/locations/'.$location->location_thumbnail));  }
        $location->delete();
        return redirect()->back();
    }
}
