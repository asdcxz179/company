<?php

namespace App\Listeners\Point;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Company\Points\PointService;

class ReducePoint
{
    protected $PointService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PointService $PointService)
    {
        $this->PointService = $PointService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->PointService->subPoint($event->account['account'],$event->product->default_fee);
    }
}
