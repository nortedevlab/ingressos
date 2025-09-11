<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['admin', 'company', 'client']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('action', 255);
            $table->string('ip', 45)->nullable();
            $table->json('data')->nullable();
            $table->timestamps();

            // relacionamentos dinâmicos, sem foreign key fixa
            // pois user pode ser admin, company ou client
            $table->index(['user_type', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
