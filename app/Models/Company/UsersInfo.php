<?php

namespace App\Models\Company;

use Dinj\Member\Models\UsersInfo as DinjUsersInfo;
use Illuminate\Support\Facades\Lang;

class UsersInfo extends DinjUsersInfo
{
    public $appends = ['trans'];
    public function getTransAttribute() {
        $key = strtoupper($this->attributes['key']);
        $value =  $this->attributes['value'];
        
        switch ($key) {
            case 'COMPANY_CITY':
                return \Dinj\Member\Models\City::find($value)->name;
                break;
            case 'COMPANY_AREA':
                return \Dinj\Member\Models\Area::find($value)->name;
                break;
            default:
                $name = "member::Admin.{$key}.{$value}";
                return Lang::has($name)?trans($name):$value;
                break;
        }
    }
}
