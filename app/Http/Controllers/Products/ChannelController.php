<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use App\Http\Requests\Products\Channel\IndexRequest;
use App\Services\Products\ChannelService;
use App\Http\Requests\Products\Channel\StoreRequest;
use App\Http\Requests\Products\Channel\UpdateRequest;

class ChannelController extends Controller
{
    protected $ChannelService;
    
    public function __construct(ChannelService $ChannelService)
    {
        $this->ChannelService = $ChannelService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->ChannelService->getProductChannel($request->products_id)]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->ChannelService->addChannel($request->products_id,$request->name,$request->setting);
        return ApiResponse::json(["message"=>"新增成功"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ChannelService->deleteChannel($id);
        return ApiResponse::json(["message"=>"刪除成功"]);
    }
}
