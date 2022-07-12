<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNombreEmpresaToClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //PARA REALIZAR UN CAMBIO EN LOS CAMPOS SE NECESITA INSTALAR "composer require doctrine/dbal"
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombreEmpresa',100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombreEmpresa',255)->change();
        });
    }
}
