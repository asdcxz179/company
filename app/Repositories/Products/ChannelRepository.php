<?php

namespace App\Repositories\Products;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Products\Channel;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    public $detail = ["name","products_id","setting","id",'type'];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Channel $channel) {
        parent::__construct($channel);
    }
    
    /**
     * 取得產品底下通道
     * @return object
     */
    public function getChannel(int $products_id) {
        return $this->select($this->detail)->where(['products_id'=>$products_id])->get();
    }

}