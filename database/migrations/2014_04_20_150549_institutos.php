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
        Schema::create("institutos",function(Blueprint $table){
            $table->unsignedBigInteger("RUC")->primary();
            $table->text("Nombre")->nullable();
            $table->unsignedBigInteger("Cuenta_Corriente");
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutos');
    }
};
