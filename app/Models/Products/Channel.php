<?php

namespace App\Models\Products;

use Dinj\Admin\Models\Universal\DinjModel;

class Channel extends DinjModel
{
    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'products_channel';
    protected $fillable = [
         'name','products_id','setting',
    ];
    protected $hidden = [
    ];
}