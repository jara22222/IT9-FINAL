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
        Schema::create('suppliers_address', function (Blueprint $table) {
            $table->string('BID',10)->primary();
            $table->string('SID', 10);
            $table->foreign('SID')->references('SID')->on('suppliers')->onDelete('cascade');
            $table->string('Branch',30);
            $table->timestamps();
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
