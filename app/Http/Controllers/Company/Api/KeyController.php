<?php

namespace App\Http\Controllers\Company\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Company\Api\Key\StoreRequest;
use App\Services\Company\Api\KeyService;
use App\Services\Company\UsersService;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;

class KeyController extends Controller
{
    protected $KeyService;
    protected $UsersService;
    
    public function __construct(KeyService $KeyService,UsersService $UsersService)
    {
        $this->KeyService = $KeyService;
        $this->UsersService = $UsersService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = $this->UsersService->getUserByaccount($request->account);
        $this->KeyService->createKey($user->uuid,$request->name,$request->remark);
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
        return ApiResponse::json(["data"=>$this->KeyService->getUserKeys($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->KeyService->delete($id);
        return ApiResponse::json(["message"=>"刪除成功"]);
    }
}
