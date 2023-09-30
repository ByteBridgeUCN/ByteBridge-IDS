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
        Schema::create('administradors', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('nombre');
<<<<<<< HEAD
            $table->string('email');
=======
            $table->string('email')->unique();
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
            $table->string('contrasena');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
