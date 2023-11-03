<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {

        Schema::create('travels', function (Blueprint $table) {

            $table->id('id');
            $table->unsignedBigInteger('originId');
            $table->foreign('originId')->references('id')->on('cities');
            $table->unsignedBigInteger('destinationId');
            $table->foreign('destinationId')->references('id')->on('cities');
            $table->integer('totalSeats');
            $table->integer('baseRate');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {

        Schema::dropIfExists('travels');
    }

};
