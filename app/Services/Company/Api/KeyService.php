<?php

namespace App\Services\Company\Api;

use App\Repositories\Company\Api\KeyRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Str;

/**
 * Class KeyService.
 */
class KeyService
{
    /** 
     * \App\Repositories\Member\KeyRepository
     * @access protected
     * @var KeyRepository
     * @version 1.0
     * @author Henry
    **/
    protected $KeyRepository;

    protected $seed = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(KeyRepository $KeyRepository) {
        $this->KeyRepository = $KeyRepository;
    }
        
    /**
     * 產生金鑰
     * @param  mixed $user_id
     * @param  mixed $name
     * @param  mixed $remark
     * @return void
     */
    public function createKey($user_id,$name,$remark = "") {

        $data = [
            'user_id'   =>  $user_id,
            'name'      =>  $name,
            'key'       =>  Str::uuid(),
            'secret'    =>  $this->makeSecret(),
            'remark'    =>  $remark,
            'status'    =>  1,
        ];
        $result = $this->KeyRepository->create($data);
        if(!$result) {
            throw new ErrorException([],"新增金鑰失敗",500);
        }
        return $result;
    }
    
    /**
     * 產生密鑰
     * @return string
     */
    public function makeSecret() {
        return substr(str_shuffle($this->seed),0,20);
    }
    
    /**
     * 取得使用者金鑰
     *
     * @param  mixed $user_id
     * @return void
     */
    public function getUserKeys($user_id) {
        return $this->KeyRepository->getUserKeys($user_id);
    }

    /**
     * 透過金鑰取得使用者
     *
     * @param  mixed $key
     * @return void
     */
    public function getUserByKey(string $key) {
        $key = $this->KeyRepository->where(['key'=>$key])->first()->getEntity();
        if(!$key) {
            return false;
        }
        return $key->member;
    }
        
    /**
     * 刪除金鑰
     * @param  mixed $id
     * @return void
     */
    public function delete($id) {
        return $this->KeyRepository->find($id)->delete();
    }

}