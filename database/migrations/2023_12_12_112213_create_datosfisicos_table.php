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
        Schema::create('datosfisicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('contextura_id')->nullable()->constrained()->nullOnDelete();
            $table->float('peso');
            $table->float('altura');
            $table->float('imc');
            $table->longText('alergias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datosfisicos');
    }
};
