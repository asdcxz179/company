<?php

namespace App\Services\Products;

use App\Repositories\Products\ProductRepository;
use Dinj\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Arr;
use DataTables;

/**
 * Class ProductService.
 */
class ProductService
{
    /** 
     * \App\Repositories\Member\ProductRepository
     * @access protected
     * @var ProductRepository
     * @version 1.0
     * @author Henry
    **/
    protected $ProductRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(ProductRepository $ProductRepository) {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * 商品列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,[]);
        return $this->ProductRepository->listQuery();
    }

    /**
     * datatable 分頁
     * @return array
     */
    public function dataTables() {
        return DataTables::of($this->getEntity())->make();
    }
    
    /**
     * 產品詳情
     * @param  mixed $id
     * @return void
     */
    public function getProduct($id) {
        return $this->ProductRepository->select($this->ProductRepository->detail)->find($id);
    }
    
    /**
     * 更新產品
     * @param  mixed $data
     * @param  mixed $id
     * @return void
     */
    public function updateProduct(array $data, int $id) {
        $productData = array_filter(Arr::only($data,["name",'default_fee','status','channel']),'strlen');
        $model =  $this->ProductRepository->find($id);
        $product = $model->update($productData);
        if(!$product){
            throw new ErrorException([],trans('common.UpdateFail'),500);
        }
        return $product;
    }
    
}