<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dni')->unique()->nullable();
            $table->string('course')->nullable(); // Curso/división
            $table->text('description')->nullable(); // Descripción o datos adicionales
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->integer('order')->default(0); // Orden de aparición
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
};