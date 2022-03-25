<?php

namespace App\Repositories\Company\Points;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Company\Points\Record;
use DB;
use DataTables;
use Illuminate\Support\Arr;

/**
 * Class PointRecordsRepository.
 */
class PointRecordsRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["before_point","after_point","type","user_id","cost_type","cost"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Record $record) {
        parent::__construct($record);
    }

    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $query = $this;
        foreach(Arr::only($where,["name","account"]) as $key => $value) {
            if($value!="") {
                $query = $query->orwhere($key,"like","%$value%");
            }
        }
        foreach(Arr::only($where,["email","phone","company"]) as $key => $value) {
            if($value!="") {
                // $query = $query->orwhereHas('info',function($query) use($key,$value) {
                //     $query->where('key',$key)->where('value', 'like', "%$value%");
                // });
            }
        }
        $query = $query->orderby('created_at')->member()->select($this->detail);
        return $query;
    }

    /**
     * datatable 分頁
     * @return array
     */
    public function dataTables() {
        return DataTables::of($this->getEntity())->make();
    }

}