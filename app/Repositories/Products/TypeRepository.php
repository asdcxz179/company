<?php

namespace App\Repositories\Products;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Products\Type;

/**
 * Class TypeRepository.
 */
class TypeRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    public $detail = ["app","sort","name"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Type $type) {
        parent::__construct($type);
    }
    
    /**
     * 取得種類
     * @return object
     */
    public function getTypes($type) {
        return $this->select($this->detail)->where(['code'=>$type])->orderby('sort')->get();
    }

}