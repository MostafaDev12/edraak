<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedJobsTable extends Migration
{
    public function up()
    {
        // Schema::create('applied_jobs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->unsignedBigInteger('career_id');
        //     $table->string('career_name');
        //     $table->string('email');
        //     $table->string('phones');
        //     $table->text('address')->nullable();
        //     $table->string('country')->nullable();
        //     $table->string('city')->nullable();
        //     $table->date('start_date')->nullable();
        //     $table->boolean('relocate')->default(false);
        //     $table->decimal('salary_expectation', 10, 2)->nullable();
        //     $table->string('hear_from')->nullable();
        //     $table->boolean('ex_military')->default(false);
        //     $table->string('resume')->nullable();
        //     $table->timestamps();

        //   // $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
        // });
    }

    public function down()
    {
        Schema::dropIfExists('applied_jobs');
    }
}