<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PfcEggLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pfc_egg_locations')->insert([
        	[
        		'location_name' => 'EGGROOM',
        		'location_code' => 'EGGROOM'
        	],
        	[
        		'location_name' => 'EGGSTORE1',
        		'location_code' => 'EGGSTORE1'
        	]
        ]);
    }
}
