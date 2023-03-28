<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');

            $table->string('black');
            $table->foreign('black')->references('username')->on('users')->onDelete('cascade');

            $table->string('white');
            $table->foreign('white')->references('username')->on('users')->onDelete('cascade');

            $table->string('winner')->nullable();
            $table->foreign('winner')->references('username')->on('users')->onDelete('cascade');

            $table->text('pgn')->nullable();

            $table->unique(['tournament_id','black', 'white']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
