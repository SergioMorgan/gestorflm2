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
        Schema::create('ostickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('user_id');
            $table->string('siom', 10)->unique();
            $table->string('estado');
            $table->string('tipo');
            $table->dateTime('fechaasignacion');
            $table->dateTime('fechallegada')->nullable();
            $table->dateTime('fechacierre')->nullable();
            $table->string('remedy')->nullable();
            $table->text('detalle')->nullable();
            $table->text('cierre')->nullable();
            $table->string('categoria')->nullable();
            // $table->string('resultadoslap')->nullable();
            $table->string('resultadoslar')->nullable();
            $table->timestamps();

            $table->foreign('site_id')
                ->references('id')
                ->on('sites')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ostickets');
    }
};
