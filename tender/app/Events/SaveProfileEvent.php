<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SaveProfileEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public function __construct($request)
    {
        $res = User::updateOrCreate(
        [
            'id' => $request->user_id
        ],
        [
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
            'address' => $request->get('address'),
            'available_amount' => $request->get('available_amount'),
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
