<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;  // this is used to represent just the public channel.
use Illuminate\Broadcasting\InteractsWithSockets; // means that we using a web socket.
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

// implementing ShouldBroadcast is a way of saying that it should broadcast the event anytime the event
// is triggered.
class NewComment implements ShouldBroadcast
// by default when we broadcast an event , the broadcast are going to be queued.
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Comment $comment;

    /**
     * Create a new event instance.
     */
    public function __construct($comment)
    {
        //
    }

    // the presence channel provides with additional events such as who is in the room.

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('');
    }
}
