<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminLanguagesTable extends Migration
{
    public function up()
    {
        // Schema::create('admin_languages', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('language_code')->unique();
        //     $table->string('language_name');
        //     $table->boolean('is_active')->default(true);
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('admin_languages');
    }
}