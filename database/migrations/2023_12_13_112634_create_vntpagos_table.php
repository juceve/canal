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
        Schema::create('vntpagos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechahora');
            $table->foreignId('vntventa_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('vnttipopago_id')->nullable()->constrained()->nullOnDelete();
            $table->string('tipopago')->nullable();
            $table->float('monto');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vntpagos');
    }
};
