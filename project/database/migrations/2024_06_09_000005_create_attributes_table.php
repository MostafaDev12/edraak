<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributable_id');
            $table->string('attributable_type');
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('input_name')->nullable();
            $table->boolean('price_status')->default(0);
            $table->boolean('details_status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}