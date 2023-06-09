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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('DNI')->primary();
            $table->text('Nombres_y_Apellidos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('Tipo',['Contador','Controlador','Administrador']);
            $table->unsignedBigInteger('RUC_Instituto')->nullable();
            $table->boolean('Activado')->default(True);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('RUC_Instituto')->references('RUC')
                ->on('institutos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
