<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('noms');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('etatcivil');
            $table->string('email')->unique();
            $table->unsignedBigInteger('fonction_id');
            $table->string('contact')->unique();
            $table->string('nationalite');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('fonction_id')->references('id')->on('fonctions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
};
