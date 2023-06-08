<?php

namespace App\Http\Requests\Kurator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            "name" => "string|required",
            "surname" => "string|required",
            "role" => "string|required",
            "faculty" => "string|required",
            "email" => "string|required",
            "password" => "string|required",
        ];
    }
}
