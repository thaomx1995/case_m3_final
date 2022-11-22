<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_detail', function (Blueprint $table) {
            $table->id();
            $table->string('product_price');
            $table->string('product_quantity');
            $table->string('product_total_price');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->unsignedBigInteger('oder_id');
            $table->foreign('oder_id')->references('id')->on('oder');
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
        Schema::dropIfExists('oder_detail');
    }
};
