<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        $posts = Post::factory(10)->make();
        // \App\Models\User::factory(10)->create();
    }
}
