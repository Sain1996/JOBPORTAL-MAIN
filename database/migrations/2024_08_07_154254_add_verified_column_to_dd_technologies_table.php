<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedColumnToDdTechnologiesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('dd_technologies') && !Schema::hasColumn('dd_technologies', 'verified')){
         Schema::table('dd_technologies', function (Blueprint $table) {
            $table->integer('verified')->default(0);
         });
        }
    }

    public function down()
    {
        Schema::table('dd_technologies', function (Blueprint $table) {
            $table->dropColumn('verified');
        });
    }
}

