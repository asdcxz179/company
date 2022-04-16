<?php

namespace App\Http\Requests\Api\Sms;

use App\Http\Requests\Api\BasicRequest;

class SendRequest extends BasicRequest
{
    public $extendRules = [
        'phone' =>  ['required'],
        'content' =>  ['required','string'],
    ];
}
