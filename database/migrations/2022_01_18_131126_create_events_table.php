<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
      
            $table->string('sujet');
            $table->text('description');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->integer('dure');
            $table->string('image');
            $table->string('type');
            $table->string('lien');
            $table->timestamps();
        })
        ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
