<?php

namespace App\Services\Feedback;

use App\Models\Feedback;

class Service{
    public function store($data){
        Feedback::create($data);
    }

    public function update($feedback, $data){
        $feedback->update($data);
    }
}