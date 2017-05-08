<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproducto')->references('id')->on('productos');
            $table->string('recibo');
            $table->integer('idproceso')->references('id')->on('procesos');
            $table->string('cliente_dni');
            $table->string('cliente_datos');
            $table->string('precio');
            $table->string('cantidad');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('anulado')->default(0);
            $table->string('motivo')->nullable();
            $table->integer('idusuario')->references('id')->on('users');
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('ventas');
    }
}
