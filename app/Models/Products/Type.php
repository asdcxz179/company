<?php

namespace App\Models\Products;

use Dinj\Admin\Models\Universal\DinjModel;

class Type extends DinjModel
{
    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'products_type';
    protected $fillable = [
         'app','name','sort','code',
    ];
    protected $hidden = [
    ];
}
