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
        Schema::create('alquilers', function (Blueprint $table) {
            $table->id();
            $table->string('empleado');
            $table->string('herramienta');
            $table->string('estatus');
            $table->double('cantidad');
            $table->date('inicio');
            $table->date('fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquilers');
    }
};
