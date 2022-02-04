<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_information', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('initial_weight_kg')->nullable();
            $table->string('current_weight_kg')->nullable();
            $table->longText('gym_goal')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('member_information');
    }
}
