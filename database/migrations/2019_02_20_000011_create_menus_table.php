<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('url')->unique();
            $table->text('description');
            $table->string('price');
            $table->boolean('is_new')->default(false);
            $table->unsignedInteger('rating');
            $table->string('thumbnail');
            $table->unsignedInteger('type_id');
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('menu_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
