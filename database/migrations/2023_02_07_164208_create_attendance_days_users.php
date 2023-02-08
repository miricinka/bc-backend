<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceDaysUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence_days_users', function (Blueprint $table) {
            $table->primary(['attendance_day_id', 'username']);

            $table->foreignId('attendance_day_id')->references('id')->on('attendance_days')->onDelete('cascade');

            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendence_days_users');
    }
}
