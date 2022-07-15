<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_regions')->insert([
	        [
	            "id" => "15",
	            "name" => "AUTONOMOUS REGION IN MUSLIM MINDANAO",
	            "code" => "ARMM"
	        ],
	        [
	            "id" => "14",
	            "name" => "CORDILLERA ADMINISTRATIVE REGION",
	            "code" => "CAR"
	        ],
	        [
	            "id" => "13",
	            "name" => "NATIONAL CAPITAL REGION",
	            "code" => "NCR"
	        ],
	        [
	            "id" => "01",
	            "name" => "ILOCOS REGION",
	            "code" => "REGION I"
	        ],
	        [
	            "id" => "02",
	            "name" => "CAGAYAN VALLEY",
	            "code" => "REGION II"
	        ],
	        [
	            "id" => "03",
	            "name" => "CENTRAL LUZON",
	            "code" => "REGION III"
	        ],
	        [
	            "id" => "04",
	            "name" => "CALABARZON",
	            "code" => "REGION IV-A"
	        ],
	        [
	            "id" => "17",
	            "name" => "MIMAROPA",
	            "code" => "REGION IV-B"
	        ],
	        [
	            "id" => "09",
	            "name" => "ZAMBOANGA PENINSULA",
	            "code" => "REGION IX"
	        ],
	        [
	            "id" => "05",
	            "name" => "BICOL REGION",
	            "code" => "REGION V"
	        ],
	        [
	            "id" => "06",
	            "name" => "WESTERN VISAYAS",
	            "code" => "REGION VI"
	        ],
	        [
	            "id" => "07",
	            "name" => "CENTRAL VISAYAS",
	            "code" => "REGION VII"
	        ],
	        [
	            "id" => "08",
	            "name" => "EASTERN VISAYAS",
	            "code" => "REGION VIII"
	        ],
	        [
	            "id" => "10",
	            "name" => "NORTHERN MINDANAO",
	            "code" => "REGION X"
	        ],
	        [
	            "id" => "11",
	            "name" => "DAVAO REGION",
	            "code" => "REGION XI"
	        ],
	        [
	            "id" => "12",
	            "name" => "SOCCSKSARGEN",
	            "code" => "REGION XII"
	        ],
	        [
	            "id" => "16",
	            "name" => "CARAGA",
	            "code" => "REGION XIII"
	        ]
        ]);
    }
}
