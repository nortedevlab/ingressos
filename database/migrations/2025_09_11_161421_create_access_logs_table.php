<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para Logs de Acesso (entrada em portões)
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pda_id')->nullable()->constrained()->nullOnDelete();
            $table->string('ticket_code');
            $table->timestamp('scanned_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_logs');
    }
};
