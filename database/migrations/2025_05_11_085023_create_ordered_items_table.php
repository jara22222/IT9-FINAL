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
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->foreignId('oid')
                  ->constrained('orders', 'oid')
                  ->onDelete('cascade');
            $table->foreignId('pid')
                  ->constrained('products', 'pid')
                  ->onDelete('cascade');
            $table->integer('qty')->default(1); // Default quantity to 1
            $table->decimal('price_at_order', 10, 2); // Store price at time of order
            $table->primary(['oid', 'pid']); // Composite primary key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_items');
    }
};