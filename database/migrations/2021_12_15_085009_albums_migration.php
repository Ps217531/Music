<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlbumsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("year")->length(4)->nullable();
            $table->integer("times_sold")->nullable();
            $table->unsignedBigInteger("band_id")->nullable();

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
        Schema::dropIfExists('albums');
    }
}
