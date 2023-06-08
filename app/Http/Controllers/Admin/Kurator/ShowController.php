<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller{
    public function __invoke(Request $request, User $kurator){
        return view('admin.kurator.show', compact('kurator'));
    }
}
