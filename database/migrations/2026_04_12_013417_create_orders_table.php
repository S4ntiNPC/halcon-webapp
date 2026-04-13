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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('customer_name');
            $table->string('customer_number');
            $table->text('fiscal_data')->nullable();
            $table->text('delivery_address');
            $table->text('notes')->nullable();
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered'])->default('Ordered');
            $table->timestamps();
            $table->softDeletes(); // Crea el campo deleted_at para el borrado lógico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
