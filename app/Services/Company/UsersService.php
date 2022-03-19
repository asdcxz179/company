<?php

namespace App\Services\Company;

use App\Repositories\Company\UsersRepository;
use App\Repositories\Company\UsersInfoRepository;
use Tymon\JWTAuth\JWTAuth;
use Dinj\Member\Services\UsersService as DinjUsersService;

/**
 * Class UsersService.
 */
class UsersService extends DinjUsersService
{
    /** 
     * \App\Repositories\Member\UsersRepository
     * @access protected
     * @var UsersRepository
     * @version 1.0
     * @author Henry
    **/
    protected $UsersRepository;

    /** 
     * \App\Repositories\Member\UsersInfoRepository
     * @access protected
     * @var UsersInfoRepository
     * @version 1.0
     * @author Henry
    **/
    protected $UsersInfoRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(UsersRepository $UsersRepository, UsersInfoRepository $UsersInfoRepository, JWTAuth $auth) {
        $this->UsersRepository = $UsersRepository;
        $this->UsersInfoRepository = $UsersInfoRepository;
        $this->auth = $auth;
    }

}