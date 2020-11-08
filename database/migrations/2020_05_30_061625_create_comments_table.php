<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->text('comment')->nullable();
            $table->integer('parent_comment_id')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
