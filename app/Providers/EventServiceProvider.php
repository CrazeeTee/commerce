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
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        
        'App\Events\UserRequestActivationEmail' => [
            'App\Listeners\UserSendActivationEmail',
        ],

        'App\Events\ShopRequestActivationEmail' => [
            'App\Listeners\ShopSendActivationEmail',
        ],

        'App\Events\ExpertRequestActivationEmail' => [
            'App\Listeners\ExpertSendActivationEmail',
        ],

        'App\Events\AdminRequestActivationEmail' => [
            'App\Listeners\AdminSendActivationEmail',
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
