<?php

namespace App\Events\Sms;

class nexmo extends basic
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
            'nexmo.api_secret' => $data['setting']['api_secret'],
            'nexmo.api_key' => $data['setting']['api_key'],
        ]);
    }

}
