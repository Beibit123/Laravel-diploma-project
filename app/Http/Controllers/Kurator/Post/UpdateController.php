<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Kurator\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController{
    public function __invoke(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $data['main_image'] = Storage::disk('public')->put('image', $data['main_image']);
        $data['preview_image'] = Storage::disk('public')->put('image', $data['preview_image']);
        $this->service->update($post, $data);
        return redirect()->route('kurator.post.show', $post->id);
    }
}
