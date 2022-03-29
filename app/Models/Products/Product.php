<?php

namespace App\Models\Products;

use Dinj\Admin\Models\Universal\DinjModel;

class Product extends DinjModel
{

    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'products';
    protected $fillable = [
         'name','default_fee','status',
    ];
    protected $hidden = [
    ];
}
