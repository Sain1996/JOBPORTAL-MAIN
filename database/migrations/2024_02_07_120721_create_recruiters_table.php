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
    if (!Schema::hasTable('recruiters')) {
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname');
            $table->string('Secondname');
            $table->string('Username');
            $table->string('Companyname');
            $table->string('Emailaddress');
            $table->string('Password');
            $table->string('Subscription');
            $table->timestamps();
        });
        }
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiters');
    }
};
