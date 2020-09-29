<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
        });

        Schema::create('money', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer("money");
        });

        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer("points");
        });

        Schema::create('things', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string("things");
        });

        Schema::create('time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("some");
            $table->string("what");
        });

        Schema::create('prize_things', function (Blueprint $table) {
            $table->increments('id');
            $table->string("what");
        });

        Schema::create('prize_money', function (Blueprint $table) {
            $table->increments('id');
            $table->string("money");
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money');
        Schema::dropIfExists('points');
        Schema::dropIfExists('things');
        Schema::dropIfExists('time');
        Schema::dropIfExists('users');
        Schema::dropIfExists('prize_things');
        Schema::dropIfExists('prize_money');
    }
}
