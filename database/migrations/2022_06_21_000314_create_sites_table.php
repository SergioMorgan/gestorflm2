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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('localid', 10)->unique();
            $table->string('zonal', 20);
            $table->string('subzona', 20)->nullable();
            $table->string('nombre', 50);
            $table->string('estado', 20);
            $table->string('clasificacion', 20)->nullable();
            $table->string('prioridad', 20)->nullable();
            $table->string('facturacion', 50)->nullable();
            $table->string('tipolocal', 50)->nullable();
            $table->string('tipozona', 20)->nullable();
            $table->decimal('latitud', $precision = 10, $scale = 8)->nullable();
            $table->decimal('longitud', $precision = 10, $scale = 8)->nullable();
            $table->string('suministro')->nullable();
            $table->string('distribuidor')->nullable();
            $table->string('torrera')->nullable();
            $table->string('departamento', 20)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('distrito', 100)->nullable();
            $table->string('direccion')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('slapresencia', 10)->nullable();
            $table->string('slaresolucion', 10)->nullable();
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
        Schema::dropIfExists('sites');
    }
};
