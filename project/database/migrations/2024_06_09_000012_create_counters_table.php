<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->integer('referral')->default(0);
            $table->integer('total_count')->default(0);
            $table->integer('todays_count')->default(0);
            $table->date('today')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('counters');
    }
}