<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->nullable();
            $table->string('current_country')->nullable();
            $table->string('country_interest')->nullable();
            $table->string('educational_interest')->nullable();
            $table->string('budget')->nullable();
            $table->string('specialization')->nullable();
            $table->string('source_of_funding')->nullable();
            $table->string('extra_activities')->nullable();
            $table->string('special_considerations')->nullable();
            $table->string('competitive_exam')->nullable();
            $table->string('passport')->nullable();
            $table->string('level')->nullable();
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
        Schema::dropIfExists('education_preferences');
    }
}
