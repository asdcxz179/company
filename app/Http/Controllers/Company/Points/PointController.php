<?php

namespace App\Http\Controllers\Company\Points;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\Points\PointService;
use DB;
use App\Services\Company\UsersService;
use App\Http\Requests\Company\Points\StoreRequest;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;

class PointController extends Controller
{
    protected $PointService;
    protected $UsersService;
    
    public function __construct(PointService $PointService,UsersService $UsersService)
    {
        $this->PointService = $PointService;
        $this->UsersService = $UsersService;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "POST";
        return view('member::points.point.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        switch ($request->type) {
            case 'add':
                $this->PointService->addPoint($request->account,$request->point);
                break;
            case 'sub':
                $this->PointService->subPoint($request->account,$request->point);
                break;
        }
        DB::commit();
        return ApiResponse::json(["message"=>"新增點數成功"]);
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

}
