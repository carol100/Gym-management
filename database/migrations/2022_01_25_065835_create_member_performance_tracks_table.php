<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPerformanceTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_performance_tracks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('gym_class_id')->nullable();
            $table->foreign('gym_class_id')->references('id')->on('gym_classes');
            $table->string('gym_trainer_id')->nullable();
            $table->foreign('gym_trainer_id')->references('id')->on('gym_trainers');
            $table->string('date')->nullable();
            $table->string('name')->nullable(); //deadlift, stiff-leg, squat
            $table->string('label')->nullable(); //absent, present, tardy
            $table->string('range_start')->nullable(); //2 kg, 5kg
            $table->string('range_end')->nullable(); //22kg, 40kg,
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('member_performance_tracks');
    }
}
