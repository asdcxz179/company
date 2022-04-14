<?php

namespace App\Http\Requests\Api\Email;

use App\Http\Requests\Api\BasicRequest;

class SendRequest extends BasicRequest
{
    public $extendRules = [
        'email' =>  ['required','email'],
    ];
}
