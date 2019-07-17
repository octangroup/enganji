<?php

namespace App\Listeners\Admin;

use App\Events\Affiliate\ProductUploaded;
use App\Models\Admin;
use App\Notifications\ProductUploadedNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductUploadedListener implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ProductUploaded  $event
     * @return void
     */
    public function handle(ProductUploaded $event)
    {
        $admins = Admin::get();
        foreach ($admins as $admin){
        $admin->notify(new ProductUploadedNotification($event->product));
        }
    }
}
