<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para Cupons de Desconto e Cortesias
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('code')->unique();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->unsignedTinyInteger('discount_percent')->nullable();
            $table->unsignedInteger('max_usage')->nullable();
            $table->unsignedInteger('used')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discount_coupons');
    }
};
