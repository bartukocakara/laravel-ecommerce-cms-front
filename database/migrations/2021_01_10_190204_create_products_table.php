<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('name');
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL']);
            $table->string('color');
            $table->integer('price');
            $table->string('description');
            $table->string('product_slug');
            $table->integer('quantity');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->enum('stock_status', ['0', '1']);
            $table->timestamps();
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
