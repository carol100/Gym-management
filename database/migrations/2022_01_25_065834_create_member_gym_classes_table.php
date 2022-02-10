<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberGymClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_gym_classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('gym_class_id')->nullable();
            $table->foreign('gym_class_id')->references('id')->on('gym_classes');
            $table->string('target')->nullable();
            $table->longText('performance')->nullable();
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
        Schema::dropIfExists('member_gym_classes');
    }
}
