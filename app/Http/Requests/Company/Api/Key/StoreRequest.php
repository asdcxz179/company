<?php

namespace App\Http\Requests\Company\Api\Key;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class StoreRequest extends BasicFormRequest
{
    public $createData = [
        'account'   =>  'required|exists:member_users,account',
        'name'      =>  'required|string',
        'remark'    =>  'nullable|string',
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
            'name'      => "Key名稱",
            'remark'    => "備註",
        ];
    }
}
