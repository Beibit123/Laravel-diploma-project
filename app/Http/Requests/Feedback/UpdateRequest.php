<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'username'=>'string|required',
            'email'=>'string|required',
            'message'=>'string|required|max:255'
        ];
    }
}
