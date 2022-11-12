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
            $table->string('personal_photo')->nullable();
            $table->string('email')->unique();
            $table->string('position');

            //the position and the role means the same things
            $table->string('employee_status')->nullable();
            $table->string('organizational_unit')->nullable();
            $table->integer('competency_ranting')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();
            $table->string('im_type')->nullable();
            $table->string('im_name')->nullable();
            $table->string('adresse')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('postal_code')->nullable();
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
