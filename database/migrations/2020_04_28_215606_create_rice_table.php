<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rice', function (Blueprint $table) {
            $table->id();
            $table->string('dealer_rice_amount');
            $table->bigInteger('area_id');
            $table->bigInteger('dealer_id');
            $table->integer('taker_limit');
            $table->string('rice_giving_time');
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
        Schema::dropIfExists('rice');
    }
}
