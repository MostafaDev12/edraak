<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('slug_ar')->nullable();
            $table->string('feature')->nullable();
            $table->string('name_ar');
            $table->string('name');
            $table->date('date')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('photo')->nullable();
            $table->string('youtube')->nullable();
            $table->decimal('monthly', 10, 2)->nullable();
            $table->decimal('half_yearly', 10, 2)->nullable();
            $table->decimal('yearly', 10, 2)->nullable();
            $table->boolean('final_sale')->default(false);
            $table->string('size')->nullable();
            $table->string('size_qty')->nullable();
            $table->string('size_price')->nullable();
            $table->string('color')->nullable();
            $table->string('mobile_photo')->nullable();
            $table->text('min_details_ar')->nullable();
            $table->text('min_details')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('views')->default(0);
            $table->string('tags')->nullable();
            $table->string('tags_ar')->nullable();
            $table->text('features')->nullable();
            $table->string('colors')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_tag_ar')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('catalog_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('hover_photo')->nullable();
            $table->string('alt')->nullable();
            $table->string('alt_ar')->nullable();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}