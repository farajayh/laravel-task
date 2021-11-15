<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Mail\PostNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user} {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $recipient = $this->argument('user');
        $post = $this->argument('post');

        Mail::to($recipient)->send(new PostNotification($post));
    }
}
