<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_master', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id');
            $table->foreignId('lead_source_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('mobile', 15);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->text('description');
            $table->string('status', 50);
            $table->date('creation_date');
            $table->double('budget', 8, 2);
            $table->integer('bhk');
            $table->integer('toilets');
            $table->integer('preferred_floor');
            $table->double('abu_area', 8, 2);
            $table->integer('parking');
            $table->string('preferred_facing', 50);
            $table->string('preferred_location', 50);
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
        Schema::dropIfExists('lead_master');
    }
}
