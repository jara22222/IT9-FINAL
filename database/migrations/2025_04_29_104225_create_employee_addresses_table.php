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
      Schema::create('employee_addresses', function (Blueprint $table) {
    $table->id('eadid'); 
    $table->string('street')->nullable();
    $table->string('city')->nullable();
    $table->string('province')->nullable();
    $table->integer('zip')->nullable(); 
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_addresses');
    }
};