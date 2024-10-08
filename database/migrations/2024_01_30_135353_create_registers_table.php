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
        if (!Schema::hasTable('registers')) {
         Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
           $table->string('last_name');
         $table->string('username')->unique(); // Assuming usernames should be unique
         $table->string('email')->unique(); // Assuming emails should be unique
     $table->string('password');
     $table->timestamps();
         });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
