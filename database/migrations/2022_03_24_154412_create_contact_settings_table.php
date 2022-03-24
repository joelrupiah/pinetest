<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table=>string('email');
            $table=>string('phone');
            $table=>string('town');
            $table=>string('address');
            $table=>string('opening_time');
            $table=>string('closing_time');
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
        Schema::dropIfExists('contact_settings');
    }
}
