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
            $table->bigIncrements('id');
            $table->integer('affiliate_id');
            $table->integer('subcategory_id');
            $table->integer('currency_id');
            $table->integer('brand_id')->nullable();
            $table->integer('condition_id');
            $table->string('name');
            $table->double('quantity');
            $table->double('price');
            $table->double('color');
            $table->string('size')->nullable();
            $table->string('location')->nullable();
            $table->boolean('status')->default(false);
            $table->text('description');
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
