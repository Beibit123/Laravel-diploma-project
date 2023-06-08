<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Feedback;

class StoreController extends BaseController{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('feedback.success');
    }
}
