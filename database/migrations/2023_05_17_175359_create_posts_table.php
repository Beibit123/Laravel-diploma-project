<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('created_by');
            $table->dateTime('time_of_event');
            $table->string('event_status');
            $table->string('main_image');
            $table->string('preview_image');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('posts');
    }
}
