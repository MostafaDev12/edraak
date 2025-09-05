<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsettingsTable extends Migration
{
    public function up()
    {
        Schema::create('socialsettings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('gplus')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('dribble')->nullable();
            $table->string('youtube')->nullable();
            $table->boolean('ystatus')->default(0);
            $table->boolean('f_status')->default(0);
            $table->boolean('t_status')->default(0);
            $table->boolean('g_status')->default(0);
            $table->boolean('l_status')->default(0);
            $table->boolean('i_status')->default(0);
            $table->string('instagram')->nullable();
            $table->boolean('d_status')->default(0);
            $table->boolean('f_check')->default(0);
            $table->boolean('g_check')->default(0);
            $table->string('fclient_id')->nullable();
            $table->string('fclient_secret')->nullable();
            $table->string('fredirect')->nullable();
            $table->string('gclient_id')->nullable();
            $table->string('gclient_secret')->nullable();
            $table->string('gredirect')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('socialsettings');
    }
}