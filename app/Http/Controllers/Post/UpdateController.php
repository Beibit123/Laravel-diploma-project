<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class UpdateController extends BaseController{
    public function __invoke(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $this->service->update($post, $data);
        return redirect()->route('post.show', $post->id);
    }
}
