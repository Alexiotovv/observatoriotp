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
        Schema::create('infografias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250)->default('');
            $table->string('imagen', 250)->default('');
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
        Schema::dropIfExists('infografias');
    }
};
