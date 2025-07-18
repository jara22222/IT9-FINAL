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
        Schema::table('employees', function (Blueprint $table) {
            
            $table->smallInteger('status')->default(0)->after('phone');
            
      
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      //drop column status if exist
      Schema::table('employees', function (Blueprint $table) {
        $table-> dropColumn('status');
        }); 
    }
};