<?php

namespace App\Http\Controllers\Company\Points;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\Points\PointRecordsService;
use DB;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;

class RecordsController extends Controller
{
    protected $PointRecordsService;
    
    public function __construct(PointRecordsService $PointRecordsService)
    {
        $this->PointRecordsService = $PointRecordsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->PointRecordsService->index(array_filter($request->all()['form']??[],'strlen'))->dataTables()]);
        }
        return view('member::points.record.index');
    }

}
