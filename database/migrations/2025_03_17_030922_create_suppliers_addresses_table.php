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
        Schema::create('suppliers_addresses', function (Blueprint $table) {
            $table->id('BID');
            $table->foreignId('SID')->nullable();
            $table->string('Branch',30);
            $table->timestamps();
            $table->foreign('SID')->references('SID')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers_addresses');
    }
};