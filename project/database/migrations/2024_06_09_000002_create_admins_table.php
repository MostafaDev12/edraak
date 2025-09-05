<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->timestamps();
        });

            DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'), 
            'phone' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}