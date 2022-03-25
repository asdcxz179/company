<?php

namespace App\Models\Company\Points;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dinj\Admin\Models\Universal\DinjModel;
use App\Models\Company\Users;

class Record extends DinjModel
{
    use HasFactory;

    public function __construct(array $attribute = [])
    {
        parent::__construct($attribute);

        $this->setIncrementing(true)->setKeyType('int')->setPrimaryKey('id');
    }

    protected $table = 'member_points_record';
    protected $fillable = [
        'type', 'before_point','after_point','user_id','cost','cost_type','remark',
    ];
    protected $hidden = [
        "user_id",
    ];

    public function member() {
        return $this->hasOne(Users::class,'uuid','user_id');
    }

    public function scopeMember($query){
        return $query->with(["member" => function($query){
            $query->select(["uuid","account","status"]);
        }]);
    }
}
