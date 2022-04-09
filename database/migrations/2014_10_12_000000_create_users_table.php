<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',50);
            $table->string('last_name',50)->default("");
            $table->string('emp_id',50);
            $table->foreignId('user_type_id');
            $table->foreignId('desigination_id');
            $table->string('email',100)->default("");
            $table->string('phone',15);
            $table->string('team_leaders',100);
            $table->enum('emp_status',['Active','Absent','Terminated','Inactive']);
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
