<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('item_name');
            $table->date('starts_at');
            $table->date('ends_at');
            $table->unsignedInteger('rental_days');
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('pendiente');
            $table->string('terms_version');
            $table->text('terms_snapshot');
            $table->timestamp('accepted_terms_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
