<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('company')->nullable();
            $table->string('program')->nullable();
            $table->string('page')->nullable();
            $table->string('job_role')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->text('message')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supports');
    }
}