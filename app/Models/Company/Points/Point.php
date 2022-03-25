<?php

namespace App\Models\Company\Points;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dinj\Admin\Models\Universal\DinjModel;

class Point extends DinjModel
{
    use HasFactory;

    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'member_points';
    protected $fillable = [
        'type', 'point','user_id',
    ];
    protected $hidden = [
        "user_id",
    ];

}
