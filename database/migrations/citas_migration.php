<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id'); // Relación con la tabla pets
            $table->unsignedBigInteger('service_id'); // Relación con la tabla services
            $table->date('date'); // Fecha de la cita
            $table->time('time'); // Hora de la cita
            $table->timestamps(); // Campos created_at y updated_at

            // Llaves foráneas
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
