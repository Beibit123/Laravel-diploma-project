<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class ShowController extends Controller{
    public function __invoke(Request $request, Feedback $feedback){
        return view('admin.feedback.show', compact('feedback'));
    }
}
