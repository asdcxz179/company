<?php

namespace App\Repositories\Company;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Company\Users;
use DB;
use DataTables;
use Illuminate\Support\Arr;
use Dinj\Member\Repositories\UsersRepository as DinjUsersRepository;

/**
 * Class UsersRepository.
 */
class UsersRepository extends DinjUsersRepository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["name","account","uuid","status","created_at","number"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Users $users) {
        parent::__construct($users);
    }

    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $query = $this;
        foreach(Arr::only($where,["name","account","status"]) as $key => $value) {
            if($value!="") {
                $query = $query->orwhere($key,"like","%$value%");
            }
        }
        foreach(Arr::only($where,["email","phone","company"]) as $key => $value) {
            if($value!="") {
                $query = $query->orwhereHas('info',function($query) use($key,$value) {
                    $query->where('key',$key)->where('value', 'like', "%$value%");
                });
            }
        }
        $query = $query->orderby('created_at')->select($this->detail)->info()->lastLogin();
        return $query;
    }

}