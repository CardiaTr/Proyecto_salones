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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha_de_reserva'); //Fecha de reserva del salon de estudio
            $table->string('Lugar', 100); // Lugar de Cucei donde esta ubicado el salon de estudio
            $table->integer('Duracion'); //Tiempo que estaran los alumnos en minutos
            $table->string('Nombre_del_alumno', 100); // Nombre del alumno que hace la reservación
            $table->string('Codigo_del_alumno', 10); // Codigo del alumno que hace la reservación

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
