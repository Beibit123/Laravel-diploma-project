<?php

namespace App\Services\Kurator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service{
    public function store($data){
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }

    public function update($user, $data){
        $user->update($data);
    }
}