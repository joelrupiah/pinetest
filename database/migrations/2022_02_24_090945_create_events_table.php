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
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->longText('eventDescription')->nullable();
            $table->string('host')->nullable();
            $table->string('location')->nullable();
            $table->string('street')->nullable();
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
        Schema::dropIfExists('events');
    }
}
