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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_de_activo');
            $table->string('descripcion')->nullable();
            $table->string('numero_de_serie',)->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->decimal('costo_actual',10,2)->nullable();
            $table->string('inventario_nacional')->nullable();
            $table->string('clave_ur')->nullable();
            $table->string('resguardante_actual')->nullable();
            $table->string('rfc_resguardante')->nullable();
            $table->integer('empleado')->nullable();
            $table->boolean('inventariado')->default(false);
            // $table->string('observaciones')->nullable();
            // $table->boolean('baja')->nullable();
            // $table->boolean('resguardante_correcto')->nullable();
            // $table->string('resguardante_nuevo')->nullable();
            // $table->string('rfc_resguardante_nuevo')->nullable();
            // $table->integer('empleado_nuevo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};