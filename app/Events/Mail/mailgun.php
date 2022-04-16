<?php

namespace App\Events\Mail;

class mailgun extends basic
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        parent::__construct($data);
        config([
            'services.mailgun.domain' => $data['setting']['domain'],
            'services.mailgun.secret' => $data['setting']['secret']
        ]);
    }

}
