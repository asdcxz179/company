<?php

namespace App\Repositories\Company\Points;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Company\Points\Point;
use DB;
use DataTables;
use Illuminate\Support\Arr;

/**
 * Class PointRepository.
 */
class PointRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["point","type"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Point $point) {
        parent::__construct($point);
    }

}