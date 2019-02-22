<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cate_id');
            $table->string('name');
            $table->text('description');
            $table->unsingedInteger('price');
            $table->boolean('stock');
            $table->boolean('new');
            $table->unsingedInteger('rating');
            $table->string('thumbnail');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cate_id')->references('id')->on('product_cates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
