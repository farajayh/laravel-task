<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Artisan;

class SendEmailNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 2;
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
        $post = $event->post;
        $users = $post->site->users;
        foreach ($users as $user){
            Artisan::call('email:send', [
                'user' => $user->email, 
                'post' => $post,
            ]);
        }
    }
}
