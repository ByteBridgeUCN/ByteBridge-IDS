<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {

        Schema::create('tickets', function (Blueprint $table) {

            $table->id('id');
            $table->unsignedBigInteger('travelId');
            $table->foreign('travelId')->references('id')->on('travels');
            $table->unsignedBigInteger('userId')->nullable();
            $table->foreign('userId')->references('id')->on('users');
            $table->date('travelDate');
            $table->timestamp('purchaseDate')->useCurrent();
            $table->integer('purchasedSeats');
            $table->integer('price');
            $table->string('ticketCode')->unique();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {

        Schema::dropIfExists('tickets');

    }

};
