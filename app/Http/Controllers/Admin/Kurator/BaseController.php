<?php

namespace App\Http\Controllers\Admin\Kurator;

use App\Http\Controllers\Controller;
use App\Services\Kurator\Service;

class BaseController extends Controller{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}