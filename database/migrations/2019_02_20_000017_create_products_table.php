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
            $table->unsignedInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->boolean('in_stock');
            $table->boolean('is_new')->default(false);
            $table->unsignedInteger('rating');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedInteger('available_quantity')->default(0);
            $table->unsignedInteger('sold_quantity')->default(0);
            $table->string('thumbnail');
            $table->timestamps();
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
