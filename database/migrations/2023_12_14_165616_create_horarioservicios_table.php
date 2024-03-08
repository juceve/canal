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
        Schema::create('horarioservicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->nullable()->constrained()->nullOnDelete();
            $table->string('hora', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarioservicios');
    }
};
