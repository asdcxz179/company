<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Products\TypeService;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;

class TypeController extends Controller
{
    protected $TypeService;
    
    public function __construct(TypeService $TypeService)
    {
        $this->TypeService = $TypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->TypeService->index($request->type)]);
        }
    }
}
