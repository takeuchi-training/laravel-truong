<?php

namespace App\Listeners;

use App\Events\RegisteredUser;
use App\Models\BlogPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateAnExamplePost
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
     * @param  \App\Providers\RegisteredUser  $event
     * @return void
     */
    public function handle(RegisteredUser $event)
    {
        $user = $event->user;

        $post = BlogPost::create([
            'title' => $user->name . " example post",
            'body' => 'Example content Example content Example content Example content Example content.',
            'user_id' => $user->id
        ]);

        return $post;
    }
}
