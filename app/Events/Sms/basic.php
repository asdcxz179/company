<?php

namespace App\Events\Sms;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class basic
{
    use Dispatchable, SerializesModels;

    public $phone;
    public $content;
    public $product;
    public $account;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->phone = $data['phone'];
        $this->content = $data['content'];
        $this->product    =   $data['product'];
        $this->account      =   $data['account'];
    }
}
