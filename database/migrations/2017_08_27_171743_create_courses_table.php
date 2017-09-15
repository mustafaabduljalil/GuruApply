<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('degree')->nullable();
            $table->string('duration')->nullable();
            $table->string('level')->nullable();
            $table->string('description')->nullable();
            $table->string('specialisation')->nullable();
            $table->integer('views')->nullable();
            $table->integer('institution_id')->nullable();
            $table->integer('total_fees')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
