<?php

namespace App\Providers;

use App\Events\Admin\ActivateAffiliate;
use App\Events\Admin\ProductApproved;
use App\Events\Affiliate\ProductUploaded;
use App\Listeners\Admin\ActivateAffiliateListener;
use App\Listeners\Admin\ProductUploadedListener;
use App\Listeners\Affiliate\ProductApprovedListener;
use App\Listeners\UserCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ProductUploaded::class => [
            ProductUploadedListener::class,
        ],
        ProductApproved::class => [
            ProductApprovedListener::class,
        ],
        ActivateAffiliate::class => [
            ActivateAffiliateListener::class,
        ],
        Registered::class => [
            UserCreatedListener::class,
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
