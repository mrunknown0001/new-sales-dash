<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PfcRegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pfc_regions')->insert([
        	[
        		'region_name' => 'Ilocos Region',
        		'region_code' => 'Region I',
        	],
        	[
        		'region_name' => 'Cagayan Valley Region',
        		'region_code' => 'Region II'
        	],
        	[
        		'region_name' => 'Central Luzon',
        		'region_code' => 'Region III'
        	]
        ]);
    }
}
