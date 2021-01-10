<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->unsignedBigInteger('poll_id')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('poll_user', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('poll_id')->references('id')->on('polls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_user');
    }
}
