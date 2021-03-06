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
             $table->text('context');
             $table->longtext('contenu');
             $table->string('image')->nullable();
             $table->tinyInteger('status')->default('0');

             $table->unsignedBigInteger('admin_id')->nullable();
             $table->foreign('admin_id')->references('id')->on('admins')->onDelete ('cascade');

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
