<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'string|required',
            'content'=>'string|required',
            'created_by'=>'string',
            'time_of_event'=>'required',
            'event_status'=>'string',
            'main_image'=>'file',
            'preview_image'=>'file'
        ];
    }
}
