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
    protected $detail = ["key","secret","status","remark"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Key $key) {
        parent::__construct($key);
    }



}