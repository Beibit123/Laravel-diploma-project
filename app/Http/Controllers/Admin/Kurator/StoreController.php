<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;


use App\Http\Controllers\Controller;
use App\Http\Requests\Kurator\StoreRequest;
use Illuminate\Http\Request;
use App\Models\User;

class StoreController extends BaseController{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.kurator.index');
    }
}
