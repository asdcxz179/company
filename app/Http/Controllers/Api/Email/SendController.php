<?php

namespace App\Http\Controllers\Api\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Email\SendRequest;
use App\Services\Company\Points\PointService;
use App\Services\Products\ProductService;
use DB;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use Dinj\Admin\Exceptions\Universal\ErrorException;

class SendController extends Controller
{
    protected $PointService;
    protected $ProductService;
    
    public function __construct(PointService $PointService,ProductService $ProductService)
    {
        $this->PointService = $PointService;
        $this->ProductService = $ProductService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendRequest $request)
    {
        DB::beginTransaction();
        $product = $this->ProductService->getProductByCode('email');
        $channel = $product->channel;
        if(!$channel) {
            throw new ErrorException([],"通道未設定",500);
        }
        $fee = $product->default_fee;
        dd($fee);
        DB::commit();
        return ApiResponse::json(["message"=>"發送成功"]);
    }

}
