<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseBrochuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_brochures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('title')->nullable();
            $table->string('personal_country')->nullable();
            $table->string('personal_city')->nullable();
            $table->string('studey_abroad')->nullable();
            $table->string('educational_country')->nullable();
            $table->string('educational_city')->nullable();
            $table->string('stream')->nullable();
            $table->string('marks')->nullable();
            $table->string('desc_country')->nullable();
            $table->string('experience')->nullable();


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
        Schema::dropIfExists('course_brochures');
    }
}
