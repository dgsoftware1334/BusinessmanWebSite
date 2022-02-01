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
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('dure');
            $table->string('image');
<<<<<<< HEAD
            $table->boolean('type');

=======
>>>>>>> 88703bf30110c5a664afb60a598232c3fb1a30d6
            $table->string('lien')->nullable();
            $table->string('lieu')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
             $table->tinyInteger('status')->default('0');
             
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
