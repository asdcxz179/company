<?php

namespace App\Services\Sms;

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
        
    /**
     * 送出郵件
     * @param  mixed $phone
     * @param  mixed $content
     * @return void
     */
    public function send(string $phone,string $content,array $account = []) {
        $product = $this->ProductRepository->where('code','sms')->first();
        if(!$product->status || !$product->channel) {
            throw new ErrorException([],"通道維護中",500);
        }
        $channel = $product->Channel;
        "\App\Events\Sms\\{$channel->type}"::dispatch([
            'phone' =>  $phone,
            'content'   =>  $content,
            'product'   =>  $product,
            'account'   =>  $account,
            'setting'   =>  $channel->setting,
        ]);
    }
    
}