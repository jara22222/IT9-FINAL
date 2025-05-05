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
   Schema::create('employees', function (Blueprint $table) {
    $table->id('eid');
    
    // Corrected foreign key - matches table name and references 'eadid'
    $table->foreignId('eadid')
          ->nullable()
          ->constrained('employee_addresses', 'eadid') // Explicitly reference 'eadid'
          ->onDelete('cascade');
    
    $table->string('first_name');
    $table->string('middle_name');
    $table->string('last_name');
    $table->integer('age');
    $table->string('gender', 10)->nullable();
    $table->date('birthday')->nullable();
    $table->string('email')->unique();
    $table->string('phone')->unique();
    $table->timestamps();
});
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('employees');
    }
};