<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
            $table->timestamp('invited_at')->nullable();
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
        $table->dropForeign(['contact_id', 'survey_id', 'tenant_id']);
        Schema::dropIfExists('invitations');
    }
}
