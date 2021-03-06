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
            $table->id();
           $table->string('name');
            $table->string('lastname');
            $table->date('datenaissance');
            $table->string('phone');
            $table->longText('description');
            $table->string('address');
            $table->string('diplome')->nullable();
            $table->string('file')->nullable();
            $table->string('lienfb')->nullable();
            $table->string('lieninsta')->nullable();
            $table->string('lientwit')->nullable();
            $table->string('linked')->nullable();
            $table->integer('anneexp')->nullable();
            $table->string('photo')->nullable();
            $table->string('siteweb')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1);
         
            $table->unsignedBigInteger('sacteur_id')->nullable();
            $table->foreign('sacteur_id')->references('id')->on('secteurs')->onDelete ('cascade');
            $table->unsignedBigInteger('admin_id')->nullable();
             $table->foreign('admin_id')->references('id')->on('admins')->onDelete ('cascade');
             
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
