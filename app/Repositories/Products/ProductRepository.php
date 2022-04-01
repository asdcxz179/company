<?php

namespace App\Repositories\Products;

use Dinj\Admin\Repositories\Universal\Repository;
use App\Models\Products\Product;
use DataTables;
use DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends Repository
{
    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    public $detail = ["code","status","name","default_fee","id","channel"];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Product $product) {
        parent::__construct($product);
    }

    /**
     * 列表SQL
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery() {
        return $this->select(array_merge($this->detail,[DB::raw('status as status_name')]));
    }

    /**
     * datatable 分頁
     * @return array
     */
    public function dataTables() {
        return DataTables::of($this->getEntity())->make();
    }

}