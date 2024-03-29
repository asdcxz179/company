<?php

namespace App\Services\Email;

use App\Repositories\Company\Points\PointRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ChannelRepository;

/**
 * Class TemplateService.
 */
class TemplateService
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
        $product = $this->ProductRepository->where('code','email')->first();
        if(!$product->status || !$product->channel) {
            throw new ErrorException([],"通道維護中",500);
        }
        $channel = $product->channel;
        $fee = $product->default_fee;

        

    }
    
}