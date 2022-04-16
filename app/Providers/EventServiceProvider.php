<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Company\Points\Point;
use App\Events\Mail\mailgun;
use App\Events\Mail\smtp;
use App\Listeners\Point\ReducePoint;
use App\Events\Sms\nexmo;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        mailgun::class => [
            ReducePoint::class,
            \App\Listeners\MailGun\SendMail::class,
        ],
        smtp::class => [
            ReducePoint::class,
            \App\Listeners\Mail\SendMail::class,
        ],


        nexmo::class => [
            ReducePoint::class,
            \App\Listeners\Sms\SendSms::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Point::observe(\App\Observers\Company\Points\PointObserver::class);
    }
}
