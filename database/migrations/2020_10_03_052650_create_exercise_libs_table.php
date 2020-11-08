<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseLibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_libs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video_title');
            $table->string('video_description');
            $table->string('tags')->nullable();
            $table->string('video_level');
            $table->string('video_name');
            $table->integer('type');
            $table->string('price')->nullable();
            $table->integer('influencer_id');
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
        Schema::dropIfExists('exercise_libs');
    }
}
