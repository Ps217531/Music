<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class songstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'title' => 'Lied1',
            'singer' => 'Artiest1',
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
        DB::table('songs')->insert([
            'title' => 'Lied2',
            'singer' => 'Artiest2',
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
        DB::table('songs')->insert([
            'title' => 'Lied3',
            'singer' => 'Artiest3',
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
        DB::table('songs')->insert([
            'title' => 'Lied4',
            'singer' => 'Artiest4',
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);



    }
}
