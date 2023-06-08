<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class CreateController extends Controller{
    public function __invoke(Request $request){
        return view('admin.kurator.create');
    }
}
