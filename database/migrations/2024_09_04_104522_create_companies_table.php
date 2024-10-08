<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('dd_companies')) {
            Schema::create('dd_companies', function (Blueprint $table) {
                $table->id();
                $table->string('name');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('dd_companies');
    }
}
