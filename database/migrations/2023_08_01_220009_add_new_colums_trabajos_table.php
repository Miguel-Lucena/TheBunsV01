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
        Schema::table('trabajos', function (Blueprint $table) {
            $table->unsignedbigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedbigInteger('turno_id');
            $table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trabajos', function (Blueprint $table) {
            //
        });
    }
};
