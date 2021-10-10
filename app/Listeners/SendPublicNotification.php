<?php

namespace App\Listeners;

use App\Events\PublicNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPublicNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PublicNotification  $event
     * @return void
     */
    public function handle(PublicNotification $event)
    {
        //
    }
}
