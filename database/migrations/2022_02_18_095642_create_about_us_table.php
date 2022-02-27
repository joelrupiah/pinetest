<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->longText('description');
            $table->string('headerOne');
            $table->string('headerTwo');
            $table->string('headerThree');
            $table->string('headerFour');
            $table->longText('descriptionOne');
            $table->longText('descriptionTwo');
            $table->longText('descriptionThree');
            $table->longText('descriptionFour');
            $table->longText('descriptionFive');
            $table->string('image');
            $table->string('video');
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
        Schema::dropIfExists('about_us');
    }
}
