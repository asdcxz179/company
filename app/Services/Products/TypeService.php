<?php

namespace App\Services\Products;

use App\Repositories\Products\TypeRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Arr;
use Dinj\Admin\Repositories\System\SettingsRepository;

/**
 * Class TypeService.
 */
class TypeService
{
    /** 
     * \App\Repositories\Member\TypeRepository
     * @access protected
     * @var TypeRepository
     * @version 1.0
     * @author Henry
    **/
    protected $TypeRepository;

    protected $SettingsRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(TypeRepository $TypeRepository, SettingsRepository $SettingsRepository) {
        $this->TypeRepository = $TypeRepository;
        $this->SettingsRepository = $SettingsRepository;
    }

    /**
     * 取得種類
     * @version 1.0
     * @author Henry
     * @return object
     */
    public function index($type) {
        return [
            'types' =>  $this->TypeRepository->getTypes($type),
            'settings'  =>  $this->SettingsRepository->CacheSettings()->where('lang',$type)->mapToGroups(function($item) {
                return [
                    $item['type']   => [
                        'name'  =>  $item['name'],
                        'type'  =>  $item['value'],
                    ],
                ];
            }),
        ];
    }
}