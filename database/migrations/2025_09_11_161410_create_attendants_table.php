<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para Atendentes de Guichê
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('attendants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booth_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendants');
    }
};
