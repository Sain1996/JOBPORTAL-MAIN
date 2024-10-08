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
        if (!Schema::hasTable('job_seekers')) {
         Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique(); // Assuming usernames should be unique
            $table->string('email')->unique(); // Assuming emails should be unique
            $table->string('password');
            $table->string('phone'); // Add phone number field
            $table->string('country_code'); // Add country code field
            $table->string('area_of_work'); // Add area of work field
            $table->string('technologies'); // Add technologies field
            $table->string('total_experience'); // Add total years of experience field
            $table->string('relevant_experience'); // Add years of relevant experience field
            $table->string('designation'); // Add designation field
            $table->string('current_ctc'); // Add current CTC field
            $table->string('expected_ctc'); // Add expected CTC field
            $table->string('current_company'); // Add current company field
            $table->string('cv'); // Add CV field (you may want to store the file path instead of the file itself)
            $table->timestamps();
         });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
