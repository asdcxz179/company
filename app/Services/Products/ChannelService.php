<?php

namespace App\Services\Products;

use App\Repositories\Products\ChannelRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Arr;

/**
 * Class ChannelService.
 */
class ChannelService
{
    /** 
     * \App\Repositories\Member\ChannelRepository
     * @access protected
     * @var ChannelRepository
     * @version 1.0
     * @author Henry
    **/
    protected $ChannelRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(ChannelRepository $ChannelRepository) {
        $this->ChannelRepository = $ChannelRepository;
    }

    /**
     * 取得種類
     * @version 1.0
     * @author Henry
     * @return object
     */
    public function getProductChannel(int $product_id) {
        return $this->ChannelRepository->getChannel($product_id);
    }
    
    /**
     * 新增通道
     * @param  mixed $product_id
     * @param  mixed $name
     * @param  mixed $setting
     * @return void
     */
    public function addChannel(int $product_id,string $type,string $name,array $setting) {
        $data = [
            'products_id'   =>  $product_id,
            'type'          =>  $type,
            'name'          =>  $name,
            'setting'       =>  json_encode($setting),
        ];
        $channel =  $this->ChannelRepository->insert($data);
        if(!$channel){
            throw new ErrorException([],trans('common.InsertFail'),500);
        }
        return $channel;
    }

    /**
     * 刪除通道
     * @param  mixed $id
     * @return void
     */
    public function deleteChannel(int $id) {
        $channel =  $this->ChannelRepository->find($id);
        $result = $channel->delete();
        if(!$result){
            throw new ErrorException([],trans('common.DeleteFail'),500);
        }
        return $channel;
    }
}