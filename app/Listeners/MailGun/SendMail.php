<?php

namespace App\Listeners\MailGun;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
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
        $result = Mail::mailer('mailgun')->raw($event->content, function ($message) use ($event) {
            $message->subject($event->title);
            $message->to($event->recipient);
        });
    }
}
