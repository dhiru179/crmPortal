<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMasterCoverPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_master_cover_photo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_master_id');
            $table->string('cover_photo_name',150);
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
        Schema::dropIfExists('project_master_cover_photo');
    }
}
