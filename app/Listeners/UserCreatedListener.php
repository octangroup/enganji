<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\UserCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreatedListener
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = User::findOrFail($event->user->id);

        $user->notify(new UserCreatedNotification($event->user));
    }
}
