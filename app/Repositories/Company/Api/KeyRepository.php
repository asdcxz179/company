<?php

namespace App\Repositories\Company\Api;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Company\Api\Key;
use DB;

/**
 * Class KeyRepository.
 */
class KeyRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["key","secret","status","remark","name","id"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Key $key) {
        parent::__construct($key);
    }

    /**
     * 取得使用者金鑰
     * @param  mixed $user_id
     * @return void
     */
    public function getUserKeys($user_id) {
        return $this->where(['user_id'=>$user_id])->select($this->detail)->get();
    }
    
    /**
     * 金鑰取得使用者密鑰
     *
     * @param string $key
     * @return void
     */
    public function getSecretByKey(string $key) {
        return $this->where(['key' => $key])->first();
    }

}