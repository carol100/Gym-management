<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymClassRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_class_rates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('gym_class_id')->nullable();
            $table->foreign('gym_class_id')->references('id')->on('gym_classes');
            $table->string('daily_rates')->nullable();
            $table->string('weekly_rates')->nullable();
            $table->string('monthly_rates')->nullable();
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
        Schema::dropIfExists('gym_class_rates');
    }
}
