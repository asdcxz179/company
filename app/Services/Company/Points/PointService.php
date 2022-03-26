<?php

namespace App\Services\Company\Points;

use App\Repositories\Company\Points\PointRepository;
use App\Repositories\Company\UsersRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;

/**
 * Class PointService.
 */
class PointService
{
    /** 
     * \App\Repositories\Member\PointRepository
     * @access protected
     * @var PointRepository
     * @version 1.0
     * @author Henry
    **/
    protected $PointRepository;

    protected $UsersRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(PointRepository $PointRepository,UsersRepository $UsersRepository) {
        $this->PointRepository = $PointRepository;
        $this->UsersRepository = $UsersRepository;
    }
    
    /**
     * 新增點數
     *
     * @return void
     */
    public function addPoint($account,$point) {
        $userPoint = $this->getUserPoint($account);
        $result = $userPoint->increment('point',$point);
        if(!$result) {
            throw new ErrorException([],"新增點數失敗",500);
        }
        return $result;
    }
    
    /**
     * 減少點數
     *
     * @return void
     */
    public function subPoint($account,$point) {
        $userPoint = $this->getUserPoint($account);
        $result = $userPoint->decrement('point',$point);
        if(!$result) {
            throw new ErrorException([],"扣除點數失敗",500);
        }
        return $result;
    }
    
    /**
     * 取得使用者點數
     *
     * @param  mixed $account
     * @return void
     */
    public function getUserPoint($account) {
        $user = $this->UsersRepository->where('account',$account)->first()->getEntity();
        if(!$user) {
            throw new ErrorException([],"無此公司",500);
        }
        $userPoint = $user->point;
        if(!$userPoint) {
            $userPoint = $this->initPoint($user);
            if(!$userPoint) {
                throw new ErrorException([],"操作失敗",500);
            }
        }
        return $userPoint;
    }
    
    /**
     * 點數初始化
     *
     * @param  mixed $user
     * @return void
     */
    public function initPoint($user) {
        return $user->point()->create([
            'type'  =>  1,
            'user_id'   =>  $user->uuid,
            'point'     =>  0,
        ]);
    }
    
}