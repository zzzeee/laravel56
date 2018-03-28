<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;

    //构造函数
    public function __construct() {
        $this->_init();
    }
}
