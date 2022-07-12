<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePositionTelefonoYAddCategoriaToClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {            
            $table->string('telefono')->after('correo')->change();
            $table->string('categoria')->nullable()->after('nombreEmpresa');
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
            $table->string('telefono')->after('correoEjecutivo')->change();
            $table->dropColumn('categoria');
        });
    }
}
