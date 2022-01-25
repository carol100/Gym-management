<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_trainers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_id')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->bigInteger('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('profile_image')->nullable();
            $table->string('password');
            $table->boolean('enabled')->default(false);
            $table->string('gym_class_id')->nullable();
            $table->foreign('gym_class_id')->references('id')->on('gym_classes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_trainers');
    }
}
