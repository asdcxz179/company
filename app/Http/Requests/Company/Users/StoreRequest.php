<?php

namespace App\Http\Requests\Company\Users;

use Dinj\Member\Http\Requests\Users\StoreRequest as DinjStoreRequest;

class StoreRequest extends DinjStoreRequest
{

    public $createData = [
        'account'   =>  'required|alpha_num|unique:member_users,account|min:6|max:20',
        'email'     =>  'required|string|email',
        'phone'     =>  'required|string|min:10|max:10',
        'company'   =>  'required|unique:member_users_info,value|string|between:1,20',
        'uniform_number'=>  'required|numeric',
        'name'      =>  'required|string|between:1,20',
        'password'  =>  'required|string|between:6,20|confirmed',
        'company_city'      =>  'required|exists:city,id',
        'company_area'      =>  'required|exists:area,id',
        'company_address'   =>  'required|string',
        'company_phone' =>  'required',
        'birthday'  =>  'nullable|date',
        'sex'       =>  'nullable|in:0,1',
    ];

    public function attributes(){
        return [
            'account'   => "帳號",
            'email'     => "Email",
            'phone'     => "手機電話",
            'birthday'  => "生日",
            'password'  => "密碼",
            'password_confirmation'  => "確認密碼",
            'company'  =>  "公司名稱",
            'uniform_number'    =>  '統一編號',
            'name'  =>  "負責人",
            'company_city'  =>  "城市",
            'company_area'  =>  "地區",
            'company_address'=> "公司地址",
            'company_phone' =>  '公司電話',
            'sex'           =>  '性別',
        ];
    }
}
