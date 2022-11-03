<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personal_photo');
            $table->string('email')->unique();
            $table->string('position');
            $table->string('role');
            //the position and the role means the same things
            $table->string('employee_status');
            $table->string('organizational_unit');
            $table->integer('competency_ranting');
            $table->string('fax');
            $table->string('mobile');
            $table->string('im_type');
            $table->string('im_name');
            $table->string('adresse');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
