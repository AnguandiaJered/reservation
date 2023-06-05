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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('provenance');
            $table->string('destination');
            $table->string('heure_depart');
            $table->string('heure_arriver');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('vol_id');
            // $table->foreignId('class_id')->constrained();
            // $table->foreignId('vol_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
};
