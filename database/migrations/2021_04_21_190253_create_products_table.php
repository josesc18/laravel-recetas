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
            $table->string('serie',255);
            $table->string('sku',255);
            $table->string('memory',255);
            $table->string('s/o',255);
            $table->string('disk',255);
            $table->string('technology',255);
            $table->text('observation');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('location_id')->references('id')->on('locations');
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
