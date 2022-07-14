<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {            
            $table->integer("id");
            $table->string('idMediaMix');
            $table->string('nombreMediaMix');
            $table->string('descripcion');
            $table->string('entregable');   
            $table->double('tarifa',8, 2); 
            $table->string('preview');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
