<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosTable extends Migration
{
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificación')->unique();
            $table->string('año_graduacion_Xciclo');
            $table->string('está_laborando');
            $table->string('lugar_de_trabajo')->nullable();
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
 
    }
}