<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaction', function (Blueprint $table) {
            $table->id();
            $table->date('interaction_date');
            $table->foreignId('interaction_type_id');
            $table->string('interactor',50);
            $table->foreignId('lead_master_id');
            $table->foreignId('project_master_id');
            $table->string('subject',100);
            $table->text('description');
            $table->boolean('mark_as_reminder');
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
        Schema::dropIfExists('interaction');
    }
}
