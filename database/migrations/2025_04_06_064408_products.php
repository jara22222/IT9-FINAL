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
       Schema::create('products', function (Blueprint $table) {
        $table->id('PID')->primary();
        $table->foreignId('PTID')->nullable()->constrained('categories','PTID')->onDelete('cascade');
        $table->foreignId('SID')->nullable()->constrained('suppliers','SID')->onDelete('cascade');
        $table->string('product_name', 30);
        $table->text('product_desc');
        $table->decimal('price', 10, 2);
        $table->tinyInteger('status')->default(0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};