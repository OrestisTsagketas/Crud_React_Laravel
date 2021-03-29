<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFssaAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fssa_answers', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('title');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('fssa_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fssa_answers');
    }
}
