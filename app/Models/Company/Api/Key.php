<?php

namespace App\Models\Company\Api;

use Dinj\Admin\Models\Universal\DinjModel;

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
}
