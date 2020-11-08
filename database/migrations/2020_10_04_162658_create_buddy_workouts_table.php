<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuddyWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddy_workouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('workout_level');
            $table->string('goal')->nullable();
            $table->integer('buddy_id');
            $table->string('time');
            $table->integer('workout_id');
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
        Schema::dropIfExists('buddy_workouts');
    }
}
