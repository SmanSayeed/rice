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

            $table->string('taker_name',256);
            $table->string('father',256);
            $table->string('mother',256);


            $table->text('husband')->nullable();
            $table->text('birthdate');

            $table->text('gender');

            $table->text('village');
            $table->text('taker_word');
            $table->bigInteger('area_id');
            $table->string('nid',256);

            $table->string('bid',256);
            $table->string('phone',256);
            $table->string('mid',256);

            $table->integer('card_id')->unique();

            $table->string('card_start_date',256);
            $table->string('card_end_date',256);

            $table->integer('approve_key')->default(1);

            $table->timestamps();

            $table->string('image',256);

            $table->string('finger_print',256);

            $table->integer('taker_key')->default(1);

            $table->bigInteger('taker_area_id')->nullable();
            $table->string('taker_area_name')->nullable();
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
