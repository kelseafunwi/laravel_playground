<?php

namespace App\Listeners;

use App\Events\Login;
use App\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class UserEventSubscriber
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    public function handleUserLogin(Login $event) {
        // some action for when the user logs in
    }

    public function handleUserLogout(Logout $event) {
        // some action to perform when the user is login out
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }

    public function subscribe(Dispatcher $event): array {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
        ];
    }
}
