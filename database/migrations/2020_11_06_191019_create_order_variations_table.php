<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_variations', function (Blueprint $table) {
            $table->id();
            $table->UnsignedInteger('count');
            $table->UnsignedDecimal('price_now', 4, 2);
            $table->UnsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->UnsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->UnsignedBigInteger('variation_id');
            $table->foreign('variation_id')->references('id')->on('variations');
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
        Schema::dropIfExists('order_variations');
    }
}
