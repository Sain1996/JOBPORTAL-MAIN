<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /** * Run the migrations. */
    public function up(): void {
        if (!Schema::hasTable('job_seekers')) {
            Schema::create('job_seekers', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username')->unique(); // Assuming usernames should be unique
                $table->string('email')->unique(); // Assuming emails should be unique
                $table->string('password');
                $table->string('phone');
                $table->string('country_code');
                $table->string('area_of_work');
                $table->string('technologies');
                $table->string('total_experience');
                $table->string('relevant_experience');
                $table->string('designation');
                $table->string('current_ctc');
                $table->string('expected_ctc');
                $table->string('current_company');
                $table->string('cv');
                $table->timestamps();
            });
        }
    }

    /** * Reverse the migrations. */
    public function down(): void {
        Schema::dropIfExists('job_seekers');
    }
};
