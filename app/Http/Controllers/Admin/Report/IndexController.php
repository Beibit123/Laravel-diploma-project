<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller{
    public function __invoke(){
        $kurators = User::all();
        return view('admin.report.index', compact('kurators'));
    }
}
