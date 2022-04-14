<?php

namespace App\Services\Email;

use App\Repositories\Company\Points\PointRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ChannelRepository;

/**
 * Class SendService.
 */
class SendService
{
    /** 
     * \App\Repositories\Member\ProductRepository
     * @access protected
     * @var ProductRepository
     * @version 1.0
     * @author Henry
    **/
    protected $ProductRepository;

    protected $ChannelRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(ProductRepository $ProductRepository,ChannelRepository $ChannelRepository) {
        $this->ProductRepository = $ProductRepository;
        $this->ChannelRepository = $ChannelRepository;
    }
    
    public function send() {

    }
    
}