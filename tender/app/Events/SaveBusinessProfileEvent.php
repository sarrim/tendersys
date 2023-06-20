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

class SaveBusinessProfileEvent
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
        // dd($request->get('email_address'));
        $res = BusinessProfile::updateOrCreate(
        [
            'id' => $request->business_id
        ],
        [
            'user_id' => Auth::user()->id,
            'business_name' => $request->get('business_name'),
            'email_address' => $request->get('email_address'),
            'contact_person' => $request->get('contact_person'),
            'contact_number' => $request->get('contact_number'),
            'business_city' => $request->get('business_city'),
            'business_address' => $request->get('business_address'),
            'business_latitude' => $request->get('business_latitude'),
            'business_longitude' => $request->get('business_longitude'),
            'business_status' => $request->get('business_status'),
            'business_profile' => $request->get('business_profile'),
            ]
        );
        $this->request = $request;
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
