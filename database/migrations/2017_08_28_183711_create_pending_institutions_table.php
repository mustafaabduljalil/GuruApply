<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution_name')->nullable();
            $table->string('person_name')->nullable();
            $table->string('institution_email')->unique()->nullable();
            $table->string('institution_phone')->nullable();
            $table->boolean('pending')->nullable();
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
        Schema::dropIfExists('pending_institutions');
    }
}
