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
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->string('numero_de_activo');
            $table->string('observaciones')->nullable();
            $table->boolean('baja')->nullable();
            $table->boolean('resguardante_correcto')->nullable();
            $table->string('resguardante_nuevo')->nullable();
            $table->string('rfc_resguardante_nuevo')->nullable();
            $table->string('empleado_nuevo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
