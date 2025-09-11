<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para Taxas de Serviço
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('batch_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('fee_percent', 5, 2)->nullable();
            $table->decimal('fee_value', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_fees');
    }
};
