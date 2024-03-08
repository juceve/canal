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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('servicio_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('vntventa_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('modalidadservicio_id')->nullable()->constrained()->nullOnDelete();
            $table->string('inicio', 10)->nullable();
            $table->string('final', 10)->nullable();
            $table->integer('creditos');
            $table->foreignId('horarioservicio_id')->nullable()->constrained()->nullOnDelete();
            $table->string('horario', 5);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
