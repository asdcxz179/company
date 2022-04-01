<?php

namespace App\Models\Products;

use Dinj\Admin\Models\Universal\DinjModel;
use Illuminate\Support\Facades\Lang;

class Product extends DinjModel
{

    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'products';
    protected $fillable = [
         'name','default_fee','status','channel'
    ];
    protected $hidden = [
    ];

    public function getStatusNameAttribute() {
        $value =  $this->attributes['status'];
        $name = "admin::Admin.Products.Status.{$value}";
        return Lang::has($name)?trans($name):$value;
    }
}
