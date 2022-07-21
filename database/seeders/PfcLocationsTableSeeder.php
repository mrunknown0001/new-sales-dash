<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PfcLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pfc_locations')->insert([
        	[
        		'region_id' => 3,
        		'location_name' => 'Tarlac',
        		'location_code' => 'Tarlac'
        	],
        	[
        		'region_id' => 3,
        		'location_name' => 'Pampanga',
        		'location_code' => 'Pampanga',
        	],
        	[
        		'region_id' => 1,
        		'location_name' => 'Ilocos',
        		'location_code' => 'Ilocos'
        	],
            [
                'region_id' => 3,
                'location_name' => 'Bataan',
                'location_code' => 'Bataan'
            ],
            [
                'region_id' => 13,
                'location_name' => 'Manila',
                'location_code' => 'Manila'
            ],
            [
                'region_id' => 3,
                'location_name' => 'Capas',
                'location_code' => 'Capas'
            ],
            [
                'region_id' => 3,
                'location_name' => 'Bamban',
                'location_code' => 'Bamban'
            ],
        ]);
    }
}
