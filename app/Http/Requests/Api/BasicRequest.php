<?php

namespace App\Http\Requests\Api;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;
use App\Rules\Api\SignRule;

class BasicRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->basicRules = [
            'key'   =>  ['required','exists:member_keys,key'],
            'sign'  =>  ['required',new SignRule],
        ];
        return array_merge($this->basicRules,$this->extendRules);
    }
}
