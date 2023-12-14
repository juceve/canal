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
        Schema::create('vntventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->date('fecha');
            $table->string('cliente')->nullable();
            $table->foreignId('cliente_id')->nullable()->constrained();            
            $table->float('importe');
            $table->string('observaciones')->nullable();
            $table->foreignId('vntestadopago_id')->constrained();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vntventas');
    }
};
