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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('first_score')->unsigned();
            $table->integer('second_score')->unsigned();
            $table->foreignId('first_team_id')->references('id')->on('teams')->onDelete('cascade')->unsigned();
            $table->foreignId('second_team_id')->references('id')->on('teams')->onDelete('cascade')->unsigned();
            $table->foreignId('listing_id')->references('id')->on('listings')->onDelete('cascade')->unsigned();
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
        Schema::dropIfExists('games');
    }
};
