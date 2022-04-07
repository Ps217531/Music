<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BandsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("genre");
            $table->integer("founded")->length(4);
            $table->string("active_til")->default('Heden');
            $table->timestamps();// timestamps is created at en updated at
            //timestamp is voor 1 onderdeel
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
