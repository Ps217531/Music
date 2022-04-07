<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlbumSongMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_song', function (Blueprint $table) {


            $table->unsignedBigInteger("album_id");
            $table->unsignedBigInteger("song_id");

            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('song_id')->references('id')->on('songs');

            $table->primary(['album_id', 'song_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_song');
    }
}
