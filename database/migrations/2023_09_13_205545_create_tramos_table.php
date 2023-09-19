<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tramos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idAdministrador');
            $table->foreign('idAdministrador')->references('id')->on('administradors');
            $table->unsignedBigInteger('idOrigen');
            $table->foreign('idOrigen')->references('id')->on('ciudads');
            $table->unsignedBigInteger('idDestino');
            $table->foreign('idDestino')->references('id')->on('ciudads');
            $table->integer('totalAsientos');
            $table->integer('tarifaBase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramos');
    }
};
