<?php

namespace App\Listeners\Admin;

use App\Events\Admin\ActivateAffiliate;
use App\Models\Affiliate;
use App\Notifications\ActivateAffiliateNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivateAffiliateListener
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
     * @param  ActivateAffiliate  $event
     * @return void
     */
    public function handle(ActivateAffiliate $event)
    {
        $affiliate = Affiliate::findOrFail($event->affiliate->id);
        $affiliate->notify(new ActivateAffiliateNotification($event->affiliate));
    }
}
