<?php

namespace App\Models\Company;

use Dinj\Member\Models\Users as DinjUsers;

class Users extends DinjUsers
{
    public $expansionField = [
        "phone",//手機號碼
        "company_phone",//市話
        "birthday",///生日
        "email",//信箱
        "sex",//性別
        "company_address",//地址
        "loginCount",//登入次數
        "phoneVerify",//手機確認
        "emailVerify",//Email確認
        "company_city",//城市
        "company_area",//地區
        "uniform_number",//統一編號
        "company",
    ];

    public function info() {
        return $this->hasMany(UsersInfo::class,'user_id','uuid')->where("key","!=","token");
    }

    
}
