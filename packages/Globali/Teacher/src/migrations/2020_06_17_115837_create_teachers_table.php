<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('nationality');
            $table->string('state');
            $table->string('post_code');
            $table->string('experience');
            $table->string('specialized_subject')->nullable();
            $table->string('assigned_subject')->nullable();
            $table->string('message')->nullable();
            $table->string('course_info')->nullable();
            $table->string('questions')->nullable();
            $table->string('assignments')->nullable();
            $table->string('payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
