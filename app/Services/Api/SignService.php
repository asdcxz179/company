<?php

namespace App\Services\Api;

use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Arr;
use App\Repositories\Company\Api\KeyRepository;

/**
 * Class SignService.
 */
class SignService
{
    /** 
     * \App\Repositories\Member\KeyRepository
     * @access protected
     * @var KeyRepository
     * @version 1.0
     * @author Henry
    **/
    protected $KeyRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(KeyRepository $KeyRepository) {
        $this->KeyRepository = $KeyRepository;
    }
    
    /**
     * 驗證簽名是否正確
     * @param  array $data
     * @return boolean
     */
    public function validate(array $data) {
        $key = $this->KeyRepository->getSecretByKey($data['key'])->getEntity();
        if(!$key) {
            return false;
        }
        return $data['sign'] == $this->makeSign($data,$key->secret);
    }
    
    /**
     * 製作簽名
     * @param  array $data
     * @param  string $secret
     * @return string
     */
    public function makeSign(array $data, string $secret) {
        $signData = array_filter($data,function($k) {
            return $k != "sign";
        },ARRAY_FILTER_USE_KEY);
        ksort($signData);
        return md5(urldecode(http_build_query($signData).$secret));
    }
}