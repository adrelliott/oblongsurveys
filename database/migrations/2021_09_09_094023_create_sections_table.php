<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('title')->nullable();
            $table->text('intro_page')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_template')->default(0);
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
        Schema::dropIfExists('sections');
    }
}
