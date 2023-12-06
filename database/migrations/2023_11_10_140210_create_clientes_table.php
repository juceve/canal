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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->foreignId('tipodoc_id')->nullable()->constrained();
            $table->string('nrodoc',30)->nullable();
            $table->string('celular',20);
            $table->string('telefono',20)->nullable();
            $table->string('email',100);
            $table->date('fechanacimiento');
            $table->foreignId('zona_id')->constrained();
            $table->longText('nObjetivos')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
