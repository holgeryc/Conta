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
        Schema::create('registros',function(Blueprint $table){
            $table->id();
            $table->date('Fecha');
            $table->string('N°_Voucher')->nullable();
            $table->string('N°_Cheque')->nullable();
            $table->integer('C_P')->nullable();
            $table->unsignedBigInteger('DNI')->nullable();
            $table->string('Nombres_y_Apellidos')->nullable();
            $table->text('Detalle')->nullable();
            $table->double('Entrada')->nullable();
            $table->double('Salida')->nullable();
            $table->double('Saldo');
            $table->unsignedBigInteger('RUC_Instituto');
            $table->boolean('Activado')->default(True);
            $table->timestamps();

            $table->foreign('RUC_Instituto')->references('RUC')->on('institutos');
            $table->foreign('DNI')->references('DNI')->on('users');
        });

        
        // $registro = DB::table('Registros')
        //                 ->join('Usuarios', 'Registros.DNI', '=', 'Usuarios.DNI')
        //                 ->select('Usuarios.DNI', 'Usuarios.Nombres y Apellidos', 'Usuarios.Nombres y Apellidos as Nombres y Apellidos')
        //                 ->get();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
