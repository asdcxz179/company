<?php

namespace App\Repositories\Company;

use App\Repositories\Universal\Repository;
use App\Models\Company\UsersInfo;
use Dinj\Member\Repositories\UsersInfoRepository as DinjUsersInfoRepository;

/**
 * Class UsersInfoRepository.
 */
class UsersInfoRepository extends DinjUsersInfoRepository
{
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(UsersInfo $usersInfo) {
        parent::__construct($usersInfo);
    }

}