<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->string('email');
            $table->string('status')->default(0);
            $table->string('little_pines')->nullable();
            $table->string('play_group')->nullable();
            $table->string('pp_one')->nullable();
            $table->string('pp_two')->nullable();
            $table->string('grade_one')->nullable();
            $table->string('grade_two')->nullable();
            $table->string('grade_three')->nullable();
            $table->string('grade_four')->nullable();
            $table->string('grade_five')->nullable();
            $table->string('grade_six')->nullable();
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
        Schema::dropIfExists('fees');
    }
}
