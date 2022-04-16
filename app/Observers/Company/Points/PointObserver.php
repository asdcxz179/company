<?php

namespace App\Observers\Company\Points;
use App\Models\Company\Points\Point;
use App\Services\Company\Points\PointRecordsService;

class PointObserver
{
    public $type = 1;
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(PointRecordsService $PointRecordsService) {
        $this->PointRecordsService = $PointRecordsService;
    }
    /**
     * Handle the Point "created" event.
     *
     * @param  \App\Models\Company\Points\Point  $Point
     * @return void
     */
    public function created(Point $Point)
    {
        //
    }

    /**
     * Handle the Point "updated" event.
     *
     * @param  \App\Models\Company\Points\Point  $Point
     * @return void
     */
    public function updated(Point $Point)
    {
        $before_point   = $Point->getOriginal('point');
        $after_point    = $Point->point;
        $type = \Request::input('type');
        $match = preg_match('/email|sms/is',\Request::path(),$data);
        if($match) {
            $type = $data[0];
        }
        $this->PointRecordsService->addRecord([
            'user_id'       =>  $Point->user_id,
            'before_point'  =>  $before_point,
            'after_point'   =>  $after_point,
            'type'          =>  $this->type,
            'cost'          =>  \Request::input('point')??abs(bcsub($after_point,$before_point,2)),
            'cost_type'     =>  $type??(($before_point<$after_point)?"add":"sub"),
            'remark'        =>  \Request::input('remark'),
        ]);
    }

    /**
     * Handle the Point "deleted" event.
     *
     * @param  \App\Models\Company\Points\Point  $Point
     * @return void
     */
    public function deleted(Point $Point)
    {
        //
    }

    /**
     * Handle the Point "restored" event.
     *
     * @param  \App\Models\Company\Points\Point  $Point
     * @return void
     */
    public function restored(Point $Point)
    {
        //
    }

    /**
     * Handle the Point "force deleted" event.
     *
     * @param  \App\Models\Company\Points\Point  $Point
     * @return void
     */
    public function forceDeleted(Point $Point)
    {
        //
    }
}
