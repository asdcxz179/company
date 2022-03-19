<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dinj\Member\Http\Controllers\UsersController as DinjUsersController;
use App\Services\Company\UsersService;

class UsersController extends DinjUsersController
{
    protected $UsersService;
    
    public function __construct(UsersService $UsersService)
    {
        $this->UsersService = $UsersService;
    }
}
