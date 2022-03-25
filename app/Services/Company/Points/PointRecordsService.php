<?php

namespace App\Services\Company\Points;

use App\Repositories\Company\Points\PointRecordsRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Arr;

/**
 * Class PointRecordsService.
 */
class PointRecordsService
{
    /** 
     * \App\Repositories\Member\PointRecordsRepository
     * @access protected
     * @var PointRecordsRepository
     * @version 1.0
     * @author Henry
    **/
    protected $PointRecordsRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(PointRecordsRepository $PointRecordsRepository) {
        $this->PointRecordsRepository = $PointRecordsRepository;
    }

    /**
     * 使用者列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,["name","account","email","phone","company"]);
        return $this->PointRecordsRepository->listQuery($where);
    }
    
    /**
     * 新增紀錄
     * @version 1.0
     * @author Henry
     * @param array $data
     * @return void
     */
    public function addRecord($data) {
        $data = Arr::only($data,["before_point","after_point","cost_type","cost","remark","type",'user_id']);
        $record = $this->PointRecordsRepository->create($data);
        if(!$record) {
            throw new ErrorException([],"新增點數紀錄失敗",500);
        }
        return $record;
    }
    
}