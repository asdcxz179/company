<?php

namespace App\Events\Mail;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class mailgun
{
    use Dispatchable, SerializesModels;

    public $recipient;
    public $content;
    public $title;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->recipient = $data['recipient'];
        $this->content = $data['content'];
        $this->title    =   $data['title'];
        config([
            'services.mailgun.domain' => $data['setting']['domain'],
            'services.mailgun.secret' => $data['setting']['secret']
        ]);
    }

}
