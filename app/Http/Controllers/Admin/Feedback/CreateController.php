<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class CreateController extends BaseController{
    public function main(Request $request){
        return view('admin.feedback.create');
    }
}
