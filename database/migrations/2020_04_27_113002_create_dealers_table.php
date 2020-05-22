<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('image');
            $table->string('address')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('approve_key')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->bigInteger('dealer_area_id')->nullable();
            $table->string('dealer_area_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealers');
    }
}
