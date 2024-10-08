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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('years_of_experience');//changed  integer to string
            $table->integer('salary');
            $table->string('qualification');
            $table->string('skills');//changed technologgy to skills
            $table->text('description');
            $table->enum('work_mode', ['Remote', 'On-site', 'Hybrid']);
            $table->date('post_date');
            $table->enum('status', ['open', 'closed'])->default('open');//open must be there and closed should be at edit time
            $table->string('company');
            $table->string(column: 'location');
            $table->string('email')->unique(); // Assuming emails should be unique
            $table->string('phone'); 
            $table->string('country_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
