<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kurator\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UpdateController extends BaseController{
    public function __invoke(UpdateRequest $request, User $kurator){
        $data = $request->validated();
        $this->service->update($kurator, $data);
        return redirect()->route('admin.kurator.show', $kurator->id);
    }
}
