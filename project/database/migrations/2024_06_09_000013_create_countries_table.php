<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('country_name');
            $table->string('country_code')->unique();
            $table->string('phonecode')->nullable();
            $table->text('phone_numbers')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_default')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}