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
        $table->id('pid')->primary();
        $table->foreignId('ptid')->nullable()->constrained('categories','ptid')->onDelete('cascade');
        $table->foreignId('sid')->nullable()->constrained('suppliers','sid')->onDelete('cascade');
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