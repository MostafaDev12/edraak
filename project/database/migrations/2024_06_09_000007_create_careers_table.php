<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    public function up()
    {
        // Schema::create('careers', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('category_id')->nullable();
        //     $table->string('slug_ar')->nullable();
        //     $table->string('feature')->nullable();
        //     $table->string('name_ar');
        //     $table->date('job_date')->nullable();
        //     $table->string('job_type')->nullable();
        //     $table->string('job_location')->nullable();
        //     $table->decimal('job_salary', 10, 2)->nullable();
        //     $table->string('name');
        //     $table->string('photo')->nullable();
        //     $table->json('size')->nullable();
        //     $table->json('size_qty')->nullable();
        //     $table->json('size_price')->nullable();
        //     $table->json('color')->nullable();
        //     $table->string('mobile_photo')->nullable();
        //     $table->text('mobile_details_ar')->nullable();
        //     $table->text('mobile_details')->nullable();
        //     $table->text('details_ar')->nullable();
        //     $table->text('details')->nullable();
        //     $table->boolean('status')->default(true);
        //     $table->unsignedInteger('views')->default(0);
        //     $table->string('tags')->nullable();
        //     $table->string('tags_ar')->nullable();
        //     $table->json('features')->nullable();
        //     $table->json('colors')->nullable();
        //     $table->string('meta_tag')->nullable();
        //     $table->string('meta_tag_ar')->nullable();
        //     $table->text('meta_description_ar')->nullable();
        //     $table->text('meta_description')->nullable();
        //     $table->string('catalog_id')->nullable();
        //     $table->string('slug')->nullable();
        //     $table->string('hover_photo')->nullable();
        //     $table->string('alt')->nullable();
        //     $table->string('alt_ar')->nullable();
        //     $table->string('title')->nullable();
        //     $table->string('title_ar')->nullable();
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('careers');
    }
}