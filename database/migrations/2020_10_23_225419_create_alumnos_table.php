<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');//Nombre completo
            $table->string('apaterno');//Nombre completo
            $table->string('amaterno');//Nombre completo
            $table->integer('tipodoc');//Tipo de documento 1: DNI, 2: Pasaporte, 3: Carnet Extr
            $table->string('nrodoc'); //Número de documento
            $table->string('correo'); //Correo
            $table->string('celular'); //Número de celular
            $table->integer('sexo');//Sexo 1: Masculino - 2: Femenino
            $table->integer('flestado')->default(1);//1: Activo - 0: Inactivo
            $table->timestamps();//Created and updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
