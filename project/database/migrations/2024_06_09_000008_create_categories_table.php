<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->string('photo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('erp_id')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('tags')->nullable();
            $table->string('tags_ar')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_description_ar')->nullable();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('details')->nullable();
            $table->text('details_ar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}