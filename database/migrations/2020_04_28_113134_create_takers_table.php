<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takers', function (Blueprint $table) {
            $table->id();

            $table->string('name',256);
            $table->string('father',256);
            $table->string('mother',256);

            $table->text('address1');
            $table->text('address2',256);
            $table->bigInteger('area_id');
            $table->string('nid',256);

            $table->string('bid',256);
            $table->string('phone',256);
            $table->string('mid',256);

            $table->string('card_id',256);

            $table->string('card_start_date',256);
            $table->string('card_end_date',256);


            $table->timestamps();

            $table->string('image',256);

            $table->string('finger_print',256);

            $table->int('taker_key')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('takers');
    }
}
