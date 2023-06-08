<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class EditController extends Controller{
    public function __invoke(Request $request, Feedback $feedback){
        return view('admin.feedback.edit', compact('feedback'));
    }
}
