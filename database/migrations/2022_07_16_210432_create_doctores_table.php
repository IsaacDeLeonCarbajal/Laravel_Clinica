<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 15)->unique();
            $table->string('nombre', 30);
            $table->string('apellido_paterno', 30);
            $table->string('apellido_materno', 30);
            $table->string('telefono', 20);
            $table->unsignedFloat('sueldo');
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->unsignedBigInteger('especialidad_id')->nullable();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores');
    }
};
