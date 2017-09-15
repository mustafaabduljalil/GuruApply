<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('university_name')->nullable();
            $table->string('course_level')->nullable();
            $table->string('degree')->nullable();
            $table->string('specialization')->nullable();
            $table->string('course_completion_year')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('mark')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('student_educations');
    }
}
