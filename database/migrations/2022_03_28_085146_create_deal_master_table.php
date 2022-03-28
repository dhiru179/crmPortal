<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_master', function (Blueprint $table) {
            $table->id();
            $table->date('deal_date');
            $table->foreignId('lead_master_id');
            $table->foreignId('project_master_id');
            $table->string('deal_type',50);
            $table->boolean('loan_application');
            $table->foreignId('loan_facilitator_id');
            $table->string('configation',50);
            $table->double('unit_area_sqft',8,2);
            $table->string('towers_name',50);
            $table->integer('floor');
            $table->double('booking_amount',8,2);
            $table->double('unit_price',8,2);
          $table->string('deal_files',255);
          $table->string('closure_type',50);
          $table->string('assign_to',100);
          $table->string('verification',50);
          $table->double('revenue',8,2);
          $table->boolean('billing_status');
          $table->boolean('credit_status');
          $table->text('remarks');
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
        Schema::dropIfExists('deal_master');
    }
}
