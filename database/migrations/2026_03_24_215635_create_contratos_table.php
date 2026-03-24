<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colaborador_id')->constrained('colaboradores')->onDelete('restrict');
            $table->enum('tipo_contrato', ['Fijo', 'Indefinido', 'Prestación de Servicios']);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('cargo');
            $table->decimal('salario', 10, 2);
            $table->enum('estado', ['Activo', 'Terminado', 'Finalizado'])->default('Activo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};