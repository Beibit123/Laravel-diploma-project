<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Kurator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DestroyController extends Controller{
    public function __invoke(Request $request, User $kurator){
        $kurator->delete();
        return redirect()->route('admin.kurator.index');
    }
}
