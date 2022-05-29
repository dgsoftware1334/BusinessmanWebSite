<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSujetsSignalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujets_signal_users', function (Blueprint $table) {
            $table->id();
            $table->longtext('motif')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')-> onDelete ('cascade');
            $table->unsignedBigInteger('sujet_id')->nullable();
            $table->foreign('sujet_id')->references('id')->on('sujets')-> onDelete ('cascade');
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
        Schema::dropIfExists('sujets_signal_users');
    }
}
