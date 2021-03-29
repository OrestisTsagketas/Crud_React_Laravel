<?php

use App\Models\Questionnaires;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFssaQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fssa_questions', function (Blueprint $table) {
            $table->increments('id')->nullable();;
            $table->string('title');
            $table->unsignedInteger('questionnaire_id');
            $table->foreign('questionnaire_id')->references('id')->on('fssa_questionnaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fssa_questions');
    }
}
