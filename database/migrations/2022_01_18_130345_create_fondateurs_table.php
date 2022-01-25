<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondateurs', function (Blueprint $table) {
            $table->id();
             $table->string('nom');
             $table->string('prenom');
             $table->string('diplom');
             $table->string('photo');
             $table->text('description');
             $table->string('Telephone')->nullable();
<<<<<<< HEAD
             $table->unsignedBigInteger('admin_id')->nullable();
             $table->foreign('admin_id')->references('id')->on('admins');
             $table->timestamps();
=======
             $table->unsignedBigInteger('chambre_id')->nullable();
             $table->foreign('chambre_id')->references('id')->on('chambres');
            $table->timestamps();
>>>>>>> 5cf071b323103b21fd7d7b82a06c7af52f11529b
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fondateurs');
    }
}
