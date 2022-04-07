<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class albumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'mooi album',
            'year' => '1999',
            'times_sold' => '1005',
            'updated_at' =>Carbon::now(),
            'created_at' =>Carbon::now()
        ]);

        DB::table('albums')->insert([
            'name' => 'blablabla',
            'year' => '1901',
            'times_sold' => '1',
            'updated_at' =>Carbon::now(),
            'created_at' =>Carbon::now()
        ]);

        DB::table('albums')->insert([
            'name' => 'lalalal',
            'year' => '2021',
            'times_sold' => '7000',
            'updated_at' =>Carbon::now(),
            'created_at' =>Carbon::now()
        ]);
        DB::table('albums')->insert([
            'name' => 'qwerty',
            'year' => '1950',
            'times_sold' => '1200000',
            'updated_at' =>Carbon::now(),
            'created_at' =>Carbon::now()
        ]);
    }
}
