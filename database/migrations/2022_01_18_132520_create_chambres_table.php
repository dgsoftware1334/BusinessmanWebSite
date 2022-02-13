<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->text('sujet');
            $table->longtext('description');
            $table->string('lien')->nullable();
            $table->text('adresse'); 
            $table->string('telephone');
            $table->longtext('politique');
            $table->string('photo');
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('linked')->nullable();
            $table->string('twit')->nullable();

          

            $table->unsignedBigInteger('admin_id')->nullable();
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
        Schema::dropIfExists('chambres');
    }
}
