<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller{
    public function __invoke(){
        $kurators = User::paginate(10);
        return view('admin.kurator.index', compact('kurators'));
    }
}
