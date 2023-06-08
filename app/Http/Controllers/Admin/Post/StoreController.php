<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $data['main_image'] = Storage::disk('public')->put('image', $data['main_image']);
        $data['preview_image'] = Storage::disk('public')->put('image', $data['preview_image']);
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }
}
