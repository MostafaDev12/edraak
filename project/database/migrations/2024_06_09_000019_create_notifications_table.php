<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        // Schema::create('notifications', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
        //     $table->foreignId('vendor_id')->nullable()->constrained('users')->onDelete('set null');
        //     $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
        //     $table->foreignId('conversation_id')->nullable()->constrained()->onDelete('set null');
        //     $table->text('text');
        //     $table->boolean('is_read')->default(false);
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}