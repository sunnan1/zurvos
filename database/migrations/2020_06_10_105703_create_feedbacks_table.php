<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->text('feedback');
            $table->text('improvement');
            $table->timestamps();
            
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
