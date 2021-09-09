<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('help_text')->nullable();
            $table->text('intro_page');
            $table->integer('order')->default(1);
            $table->foreignId('survey_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
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
        $table->dropForeign(['survey_id', 'tenant_id']);
        Schema::dropIfExists('questions');
    }
}
