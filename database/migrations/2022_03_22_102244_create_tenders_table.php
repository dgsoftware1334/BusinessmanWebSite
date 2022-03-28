<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->text('intitule');
            $table->longtext('description');
            $table->date('date_parution');
            $table->date('date_limite');
            $table->unsignedBigInteger('sacteur_id')->nullable();
            $table->foreign('sacteur_id')->references('id')->on('secteurs')->onDelete ('cascade');
            $table->string('wilaya');
            $table->text('adresse'); 
            $table->string('type');
            $table->boolean('genre')->default(1);
            $table->boolean('etat')->default(1);
            $table->string('doc')->nullable();
            $table->string('image')->nullable();
            $table->string('societe');
            $table->string('prix_cahier')->nullable();
            
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
        Schema::dropIfExists('tenders');
    }
}
