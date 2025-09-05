<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeotoolsTable extends Migration
{
    public function up()
    {
        Schema::create('seotools', function (Blueprint $table) {
            $table->id();
            $table->string('google_analytics')->nullable();
            $table->string('meta_keys')->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->string('meta_keys_ar')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('product_analytics')->nullable();
            $table->string('category_analytics')->nullable();
            $table->string('offer_analytics')->nullable();
            $table->string('brand_analytics')->nullable();
            $table->string('subcategory_analytics')->nullable();
            $table->string('childcategory_analytics')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seotools');
    }
}