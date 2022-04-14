<?php

namespace App\Http\Controllers\Api\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Email\SendRequest;
use App\Services\Email\SendService;
use App\Services\Products\ProductService;
use DB;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use Dinj\Admin\Exceptions\Universal\ErrorException;

class SendController extends Controller
{
    protected $SendService;
    protected $ProductService;
    
    public function __construct(SendService $SendService,ProductService $ProductService)
    {
        $this->SendService = $SendService;
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
        $product = $this->SendService->send();
        DB::commit();
        return ApiResponse::json(["message"=>"發送成功"]);
    }

}
