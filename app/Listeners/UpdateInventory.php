<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventory
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $purchase = $event->purchase;

    }
}
