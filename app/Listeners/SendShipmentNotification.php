<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendShipmentNotification
{
     /**
     * Handle the event.
     */
    // the event class used is the constructor is the one that this listener is going to react to
    public function handle(OrderShipped $event): void
    {
        // the action to perform when the event is triggered.
    }
}
