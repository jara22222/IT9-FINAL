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
        Schema::table('users', function (Blueprint $table) {
            // Add nullable foreign key to roles table
            $table->foreignId('rid')
                  ->nullable()
                  ->constrained('roles','rid')
                  ->onDelete('cascade');
                  
            // Add nullable foreign key to employees table
            $table->foreignId('eid')
                  ->nullable()
                  ->constrained('employees','eid')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign keys first to avoid errors
            $table->dropForeign(['rid']);
            $table->dropForeign(['eid']);
            
            // Then drop the columns
            $table->dropColumn(['rid', 'eid']);
        });
    }
};