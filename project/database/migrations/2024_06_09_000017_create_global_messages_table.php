<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('global_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->boolean('status')->default(1);
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('global_messages');
    }
}