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
<<<<<<< HEAD
            $table->string('email')->unique();
            $table->string('password');
=======
<<<<<<< HEAD
            $table->string('email');
=======
            $table->string('email')->unique();
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
            $table->string('contrasena');
>>>>>>> dev
=======
            $table->string('email')->unique();
            $table->string('password');
>>>>>>> 1ce2dac7168a26586f70cf058c9f4ca69196c6ad
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
