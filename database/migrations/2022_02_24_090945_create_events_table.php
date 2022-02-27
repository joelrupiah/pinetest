<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
            $table->longText('description');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->longText('eventDescription');
            $table->longText('eventContent');
            $table->string('topics');
            $table->string('host');
            $table->string('location');
            $table->string('students');
            $table->string('assessments');
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
        Schema::dropIfExists('events');
    }
}
