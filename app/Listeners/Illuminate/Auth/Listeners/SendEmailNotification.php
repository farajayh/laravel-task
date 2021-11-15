<?php

namespace App\Listeners\Illuminate\Auth\Listeners;

use Illuminate\Auth\Events\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotification
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
     * @param  NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
        //create email queue
    }
}
