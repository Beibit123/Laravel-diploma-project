<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class DestroyController extends Controller{
    public function __invoke(Request $request, Feedback $feedback){
        $feedback->delete();
        return redirect()->route('admin.feedback.index');
    }
}
