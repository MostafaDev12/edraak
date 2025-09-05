<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('currency');
            $table->string('currency_code');
            $table->decimal('price', 10, 2);
            $table->integer('days');
            $table->integer('allowed_products');
            $table->text('details')->nullable();
            $table->integer('marks')->nullable();
            $table->date('date')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}