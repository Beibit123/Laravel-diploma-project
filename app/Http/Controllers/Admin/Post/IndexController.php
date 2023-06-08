<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller{
    public function __invoke(){
        $posts = Post::paginate(10);
        return view('admin.post.index', compact('posts'));
    }
}
