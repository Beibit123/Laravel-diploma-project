<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Kurator\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DestroyController extends Controller{
    public function __invoke(Request $request, Post $post){
        $post->delete();
        return redirect()->route('kurator.post.index');
    }
}
