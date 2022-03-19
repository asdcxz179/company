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

}