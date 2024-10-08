<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlansTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('subscription_plans')) {
         Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->decimal('amount', 10, 2);
            $table->integer('status');
            $table->timestamps();
         });
        }
    }

    public function down()
    {
        Schema::dropIfExists('subscription_plans');
    }
}
