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
        Schema::create('normatividads', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 250)->default('');
            $table->string('descripcion', 250)->default('');
            $table->date('fecha');
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('normatividads');
    }
};
