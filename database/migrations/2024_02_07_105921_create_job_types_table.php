<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    if (!Schema::hasTable('job_types')) {
        Schema::create('job_types', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->timestamps();
        });
      }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_types');
    }
};
