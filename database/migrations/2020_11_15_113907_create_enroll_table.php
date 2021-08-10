<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id');
            $table->unsignedBigInteger('course_id');

             $table->foreign('register_id') 
                    ->references('id')
                    ->on('registers')
                    ->onDelete('cascade');

             $table->foreign('course_id') 
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('enroll');
    }
}
