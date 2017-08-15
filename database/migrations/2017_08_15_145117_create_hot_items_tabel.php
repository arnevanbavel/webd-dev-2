<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotItemsTabel extends Migration
{
    public function up()
    {
        Schema::create('hot_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('place');
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
        Schema::dropIfExists('hot_items');
    }
}
