<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_master', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_name', 50);
            $table->double('budget', 8, 2);
            $table->string('campagin_status', 50);
            $table->string('assign_to', 50);
            $table->text('description');
            $table->date('end_date');
            $table->date('start_date');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_master');
    }
}
