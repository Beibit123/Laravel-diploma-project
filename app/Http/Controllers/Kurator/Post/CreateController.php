<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Kurator\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class CreateController extends Controller{
    public function __invoke(Request $request){
        $users = User::all();
        return view('kurator.post.create', compact('users'));
    }
}
