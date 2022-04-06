<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesiganationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desiganation', function (Blueprint $table) {
            $table->id();
            $table->string('desigination_code',50);
            $table->string('desigination',100);
            $table->string('department',50);
            $table->text('description');
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
        Schema::dropIfExists('desiganation');
    }
}
