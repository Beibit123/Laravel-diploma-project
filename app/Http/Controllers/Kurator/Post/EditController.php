<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Kurator\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class EditController extends Controller{
    public function __invoke(Request $request, Post $post){
        $users = User::all();
        return view('kurator.post.edit', compact('post', 'users'));
    }
}
