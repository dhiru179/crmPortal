<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_reg', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->enum('status',['Active','Inactive']);
            $table->text('description');
            $table->foreignId('campaign_master_id');
            $table->string('instance_module',50);
            $table->string('field',50);
            $table->string('operator',50);
            $table->string('type',50);
            $table->string('value',50);
            $table->foreignId('interaction_type_id');
            $table->string('action_type',20);
            $table->string('frequency_type',20);
            $table->integer('interval');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('assign',200);
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
        Schema::dropIfExists('instance_reg');
    }
}
