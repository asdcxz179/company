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
        
    /**
     * 送出郵件
     * @param  mixed $recipient
     * @param  mixed $title
     * @param  mixed $content
     * @return void
     */
    public function send(string $recipient,string $title,string $content) {
        $product = $this->ProductRepository->where('code','email')->first();
        if(!$product->status || !$product->channel) {
            throw new ErrorException([],"通道維護中",500);
        }
        $channel = $product->Channel;
        "\App\Events\Mail\\{$channel->type}"::dispatch([
            'recipient' =>  $recipient,
            'content'   =>  $content,
            'title'   =>  $title,
            'setting'   =>  $channel->setting,
        ]);
    }
    
}