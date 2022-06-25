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
        Schema::create('clockstops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('osticket_id');
            $table->datetime('inicio')->nullable();
            $table->datetime('fin')->nullable();
            $table->string('motivo')->nullable();
            $table->string('sustento')->nullable();

            $table->foreign('osticket_id')
                ->references('id')
                ->on('ostickets')
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
        Schema::dropIfExists('clockstops');
    }
};
