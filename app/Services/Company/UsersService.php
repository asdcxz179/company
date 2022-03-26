<?php

namespace App\Services\Company;

use App\Repositories\Company\UsersRepository;
use App\Repositories\Company\UsersInfoRepository;
use Tymon\JWTAuth\JWTAuth;
use Dinj\Member\Services\UsersService as DinjUsersService;
use Illuminate\Support\Arr;
use Dinj\Admin\Exceptions\Universal\ErrorException;

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

    /**
     * 使用者列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,["name","account","status","email","phone","company"]);
        return $this->UsersRepository->listQuery($where);
    }
    
    /**
     * 取的使用者
     * @param  mixed $account
     * @return object
     */
    public function getUserByaccount($account) {
        $user = $this->UsersRepository->where(['account'=>$account])->first()->getEntity();
        if(!$user) {
            throw new ErrorException([],"查無使用者",500);
        }
        return $user;
    }
    
}