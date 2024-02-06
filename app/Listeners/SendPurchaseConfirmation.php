<?php

namespace App\Listeners;

use App\Mail\PurchaseConfirmationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

// implementing ShouldQueue means that the listener is not executed immediately
// but rather sent to the queue list to increase the performance of the application.
class SendPurchaseConfirmation implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $purchase = $event->purchase;

        // send the purchase confirmation email with the details
        Mail::to($purchase->email)->send(new PurchaseConfirmationEmail($purchase));
    }
}
