<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Affiliate\ProductUploaded' => [
            'App\Listeners\Admin\ProductUploadedListener',
        ],
        'App\Events\Admin\ProductApproved' => [
            'App\Listeners\Affiliate\ProductApprovedListener',
        ],
        'App\Events\Admin\ActivateAffiliate' => [
            'App\Listeners\Admin\ActivateAffiliateListener',
        ],
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\UserCreatedListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
