<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PfcFarmLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pfc_farm_locations')->insert([
        	[
        		'location_name' => 'Poultrypure Farms Corporation',
        		'location_code' => 'PFC'
        	],
			[
				'location_name' => 'Brookdale Farms Corporation',
				'location_code' => 'BDL'
			]        	
        ]);
    }
}
