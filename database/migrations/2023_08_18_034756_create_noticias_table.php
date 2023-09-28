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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 250)->default('');
            $table->longText('descripcion');
            $table->longText('contenido');
            $table->date('fecha');
            $table->string('ruta_foto', 250)->default('');
            $table->boolean('slider')->default(false);
            $table->boolean('portada')->default(false);
            $table->boolean('estado')->default(false);
            $table->bigInteger('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
