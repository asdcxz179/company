<?php

namespace App\Http\Requests\Company\Users;

class UpdateRequest extends StoreRequest
{
    protected $updateStatus = [
        'status'    =>  'required|in:1,0',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        unset($this->createData['account']);
        $this->createData['password'] = 'nullable|string|between:6,20|confirmed';
        return (Request("action")=="status")?$this->updateStatus:$this->createData;
    }
}
