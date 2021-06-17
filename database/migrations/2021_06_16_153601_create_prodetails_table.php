<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->foreignId('scale_id');
            $table->foreignId('brand_id');
            $table->foreignId('weight_id');
            $table->foreignId('category_id');
            $table->string('quantity');
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
        Schema::dropIfExists('prodetails');
    }
}
