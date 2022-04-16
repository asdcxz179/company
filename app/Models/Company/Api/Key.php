<?php

namespace App\Models\Company\Api;

use Dinj\Admin\Models\Universal\DinjModel;
use App\Models\Company\Users;

class Key extends DinjModel
{
    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'member_keys';
    protected $fillable = [
        'key', 'secret','user_id','remark','name','status',
    ];

    public function member() {
        return $this->hasOne(Users::class,'uuid','user_id');
    }
}
