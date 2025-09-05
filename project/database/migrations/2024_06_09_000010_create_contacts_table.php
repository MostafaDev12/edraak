<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('job_role')->nullable();
            $table->string('phone')->nullable();
            $table->text('customers')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}