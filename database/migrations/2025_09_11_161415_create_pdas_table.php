<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para Dispositivos PDA (controle de acesso)
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('pdas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('identifier'); // Ex: PDA-PORTAO-1
            $table->string('gate')->nullable(); // Nome/portão associado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pdas');
    }
};
