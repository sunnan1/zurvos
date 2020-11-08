<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name1')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('street_address')->nullable();
            $table->string('phoneno')->nullable();
            $table->text('gym_detail')->nullable();
            $table->string('cost_per_day')->nullable();
            $table->string('status')->nullable();
            $table->string('check')->nullable();
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
        Schema::drop('gyms');
    }
}
