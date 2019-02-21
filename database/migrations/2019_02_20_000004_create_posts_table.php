<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cate_id');
            $table->unsignedInteger('user_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('excerpt');
            $table->boolean('published');
            $table->boolean('preview'); // save a copy to current column. and return to route /preview/post/post-slug
            $table->string('thubnail')->default('/img/PostDefaultThumbnail.jpg');
            $table->timestamps();
            $table->foreign('cate_id')->references('id')->on('post_cates');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
