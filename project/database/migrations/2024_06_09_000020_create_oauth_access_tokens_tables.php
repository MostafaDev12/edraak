<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthAccessTokensTables extends Migration
{
    public function up()
    {
        // Schema::create('oauth_access_tokens', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('token')->unique();
        //     $table->unsignedBigInteger('user_id')->index();
        //     $table->string('client_id')->index();
        //     $table->string('scopes')->nullable();
        //     $table->timestamp('expires_at')->nullable();
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('oauth_access_tokens');
    }
}