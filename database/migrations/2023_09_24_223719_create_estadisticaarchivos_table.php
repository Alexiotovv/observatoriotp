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
        Schema::create('estadisticaarchivos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idestadistica')->unsigned();
            $table->foreign('idestadistica')->references('id')->on('estadisticas')->onDelete('cascade');
            $table->string('archivo', 250)->default('');
            $table->string('extension', 100)->default('');
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
        Schema::dropIfExists('estadisticaarchivos');
    }
};
