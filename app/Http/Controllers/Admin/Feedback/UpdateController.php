<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Feedback;

class UpdateController extends BaseController{
    public function __invoke(UpdateRequest $request, Feedback $feedback){
        $data = $request->validated();
        $this->service->update($feedback, $data);
        return redirect()->route('admin.feedback.show', $feedback->id);
    }
}
