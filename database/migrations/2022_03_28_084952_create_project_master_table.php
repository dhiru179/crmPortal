<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_master', function (Blueprint $table) {
            $table->id();
            $table->string('status',50);
            $table->string('project_name',100);
            $table->foreignId('devloper_reg_id');
            $table->string('email',100);
            $table->string('project_type',50);
            $table->date('possession_date');
            $table->string('onward_price',15);
            $table->double('project_area',8,2);
            $table->text('address');
            $table->foreignId('preferred_location_id');
            $table->string('neighbours',200);
            $table->text('description');
            $table->string('location_pre_approved_by',200);
            $table->string('brochure',255);
            $table->string('videos',255);
            $table->string('map_latitude',100);
            $table->string('map_longitude',100);
            $table->integer('units_available');
            $table->string('configuration',100);
            $table->double('unit_area_sqft',8,2);
            $table->integer('towers');
            $table->integer('floors');
            $table->string('facing',100);
            $table->string('furnished_satus',100);
            $table->string('indoor_amenties',100);
            $table->string('outdoor_amenties',100);
            $table->string('security',100);
            $table->string('view',100);
            $table->double('book_amount',8,2);
            $table->double('base_price',8,2);
            $table->double('floor_rise_price',8,2);
            $table->boolean('parking_available');
            $table->double('parking_price_range',8,2);
            $table->double('approx_annual_maintence_charge',8,2);
            $table->double('registration_charge',8,2);
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
        Schema::dropIfExists('project_master');
    }
}
