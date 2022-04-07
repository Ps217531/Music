<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'nick',
            'genre' => 'rock',
            'founded' => '1989',
            'active_til' => "1234",
            'updated_at' =>Carbon::now(),
            'created_at' =>Carbon::now()
        ]);
    }
}
