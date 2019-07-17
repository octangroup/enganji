<?php

namespace App\Listeners\Affiliate;

use App\Events\Admin\ProductApproved;
use App\Models\Affiliate;
use App\Notifications\ProductApprovedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductApprovedListener
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
     * @param  ProductApproved  $event
     * @return void
     */
    public function handle(ProductApproved $event)
    {
        $affiliate = Affiliate::findOrFail($event->product->affiliate->id);
        $affiliate->notify(new ProductApprovedNotification($event->product));
    }
}
