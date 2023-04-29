<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments_users', function (Blueprint $table) {
            $table->primary(['tournament_id', 'username']);
            $table->timestamps();

            $table->foreignId('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');

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
        Schema::dropIfExists('tournaments_users');
    }
}
