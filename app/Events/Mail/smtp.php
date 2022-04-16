<?php

namespace App\Events\Mail;


class smtp extends basic
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
            'mail.mailers.smtp.host'    =>  $data['setting']['host'],
            'mail.mailers.smtp.port'    =>  $data['setting']['port'],
            'mail.mailers.smtp.encryption'    =>  $data['setting']['encryption'],
            'mail.mailers.smtp.username'    =>  $data['setting']['username'],
            'mail.mailers.smtp.password'    =>  $data['setting']['password'],
        ]);
    }
}
