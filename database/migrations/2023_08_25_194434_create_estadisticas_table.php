<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idperiodos')->unsigned();
            $table->foreign('idperiodos')->references('id')->on('periodos')->onDelete('cascade');
            $table->bigInteger('idinstituciones')->unsigned();
            $table->foreign('idinstituciones')->references('id')->on('instituciones')->onDelete('cascade');
            $table->string('titulo', 100)->default('');
            $table->longText('contenido');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas');
    }
};
