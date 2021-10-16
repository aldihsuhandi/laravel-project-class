<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_posts', function (Blueprint $table) {
            $table -> unsignedBigInteger('userId');
            $table -> foreign('userId') -> references('id') -> on('users') -> onDelete('cascade');
            $table -> unsignedBigInteger('postId');
            $table -> foreign('postId') -> references('id') -> on('posts') -> onDelete('cascade');
            $table -> integer('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_posts');
    }
}
