<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
             $table->string('context');
             $table->text('contenu');
             $table->string('image')->nullable();
             $table->tinyInteger('status')->default('0');
<<<<<<< HEAD
              $table->unsignedBigInteger('admin_id')->nullable();
=======
             $table->unsignedBigInteger('admin_id')->nullable();
>>>>>>> 5cf071b323103b21fd7d7b82a06c7af52f11529b
             $table->foreign('admin_id')->references('id')->on('admins');

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
        Schema::dropIfExists('publications');
    }
}
