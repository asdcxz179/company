<?php

namespace App\Listeners\Sms;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSms
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $basic  = new \Vonage\Client\Credentials\Basic(config('nexmo.api_key'),config('nexmo.api_secret'));
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($event->phone, env('APP_NAME'), $event->content)
        );
    }
}
