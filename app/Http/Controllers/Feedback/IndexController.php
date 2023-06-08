<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class IndexController extends Controller{
    public function __invoke(){
        $feedbacks = Feedback::all();
        return view("feedback.index", compact('feedbacks'));
    }

}
