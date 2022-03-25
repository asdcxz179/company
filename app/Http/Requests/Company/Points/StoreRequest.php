<?php

namespace App\Http\Requests\Company\Points;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class StoreRequest extends BasicFormRequest
{
    public $createData = [
        'account'   =>  'required|exists:member_users,account',
        'point'     =>  'required|numeric|min:1',
        'type'      =>  'required|in:add,sub',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->createData;
    }

    public function attributes(){
        return [
            'account'   => "帳號",
            'point'     => "點數",
            'type'      => "類型",
            'remark'    => "備註",
        ];
    }
}
