<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Services\Feedback\Service;

class BaseController extends Controller{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}