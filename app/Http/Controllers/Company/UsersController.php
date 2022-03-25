<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\UsersService;
use App\Http\Requests\Company\Users\StoreRequest;
use App\Http\Requests\Company\Users\UpdateRequest;
use DB;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;

class UsersController extends Controller
{
    protected $UsersService;
    
    public function __construct(UsersService $UsersService)
    {
        $this->UsersService = $UsersService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->UsersService->index(array_filter($request->all()['form']??[],'strlen'))->dataTables()]);
        }
        return view('member::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "POST";
        return view('member::form',$data);
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
        $this->UsersService->createUser($request->all());
        DB::commit();
        return ApiResponse::json(["message"=>"新增成功"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data"=>$this->UsersService->getUser($id)->append('status_name') ]);
        }
        return view('member::detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['method'] = "PUT";
        return view('member::form',$data);
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
        DB::beginTransaction();
        $this->UsersService->updateUser($request->all(),$id);
        DB::commit();
        return ApiResponse::json(["message"=>"更新成功"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
