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
        Schema::create('normatividadarchivos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 250)->default('');
            $table->string('archivo', 250)->default('');
            $table->string('extension', 100)->default('');
            $table->boolean('estado')->default(true);
            $table->date('fecha');
            $table->bigInteger('idnormatividad')->unsigned();
            $table->foreign('idnormatividad')->references('id')->on('normatividads')->onDelete('cascade');
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
        Schema::dropIfExists('normatividadarchivos');
    }
};
