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
use App\Services\Company\Api\KeyService;

class SendController extends Controller
{
    protected $SendService;
    protected $ProductService;
    protected $KeyService;
    
    public function __construct(SendService $SendService,ProductService $ProductService,KeyService $KeyService)
    {
        $this->SendService = $SendService;
        $this->ProductService = $ProductService;
        $this->KeyService = $KeyService;
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
        $account = $this->KeyService->getUserByKey($request->key)->toarray();
        $product = $this->SendService->send($request->email,$request->title,$request->content,$account);
        DB::commit();
        return ApiResponse::json(["message"=>"發送成功"]);
    }

}
