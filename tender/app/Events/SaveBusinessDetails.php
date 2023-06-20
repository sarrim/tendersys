<?php

namespace App\Events;

use App\Models\BusinessProfile;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SaveBusinessDetails
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        // dd($request->business_name);
        $business = BusinessProfile::find($request->business_id);
        $business->user_id = Auth::user()->id;
        $business->business_name = $request->business_name;
        $business->email_address = $request->email_address;
        $business->contact_person = $request->contact_person;
        $business->contact_number = $request->contact_number;
        $business->business_city = $request->business_city;
        $business->postal_code = $request->postal_code;
        $business->business_address = $request->business_address;
        $business->business_latitude = $request->business_latitude;
        $business->business_longitude = $request->business_longitude;
        $business->business_profile = $request->business_profile;
        $res = $business->save();

        return true;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
