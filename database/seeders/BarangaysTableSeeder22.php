<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
// page 43
class BarangaysTableSeeder22 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_barangays')->insert([
            
            ["id"=>"126306019","name"=>"Zone IV (Pob.)","region_id"=>"12","province_id"=>"1263","city_id"=>"126306"],
            ["id"=>"112412021","name"=>"Zone IV (Pob.)","region_id"=>"11","province_id"=>"1124","city_id"=>"112412"],
            ["id"=>"086417030","name"=>"Zone IV (Pob.)","region_id"=>"08","province_id"=>"0864","city_id"=>"086417"],
            ["id"=>"063012049","name"=>"Zone IV Pob. (Barangay 4)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"056203008","name"=>"Zone IV Pob. (Bgy. 4- West Central)","region_id"=>"05","province_id"=>"0562","city_id"=>"056203"],
            ["id"=>"063012054","name"=>"Zone IX Pob. (Barangay 9)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"064520008","name"=>"Zone V (Pob.)","region_id"=>"06","province_id"=>"0645","city_id"=>"064520"],
            ["id"=>"086417031","name"=>"Zone V (Pob.)","region_id"=>"08","province_id"=>"0864","city_id"=>"086417"],
            ["id"=>"015511077","name"=>"Zone V (Pob.)","region_id"=>"01","province_id"=>"0155","city_id"=>"015511"],
            ["id"=>"015531039","name"=>"Zone V (Pob.)","region_id"=>"01","province_id"=>"0155","city_id"=>"015531"],
            ["id"=>"050507008","name"=>"Zone V (Pob.)","region_id"=>"05","province_id"=>"0505","city_id"=>"050507"],
            ["id"=>"015547012","name"=>"Zone V (Pob.)","region_id"=>"01","province_id"=>"0155","city_id"=>"015547"],
            ["id"=>"063012050","name"=>"Zone V Pob. (Barangay 5)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"056203009","name"=>"Zone V Pob. (Bgy. 5-Lanipan)","region_id"=>"05","province_id"=>"0562","city_id"=>"056203"],
            ["id"=>"015511078","name"=>"Zone VI (Pob.)","region_id"=>"01","province_id"=>"0155","city_id"=>"015511"],
            ["id"=>"050507009","name"=>"Zone VI (Pob.)","region_id"=>"05","province_id"=>"0505","city_id"=>"050507"],
            ["id"=>"063012051","name"=>"Zone VI Pob. (Barangay 6 )","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"056203010","name"=>"Zone VI Pob. (Bgy. 6- Baybay)","region_id"=>"05","province_id"=>"0562","city_id"=>"056203"],
            ["id"=>"050507010","name"=>"Zone VII (Pob.)","region_id"=>"05","province_id"=>"0505","city_id"=>"050507"],
            ["id"=>"015511079","name"=>"Zone VII (Pob.)","region_id"=>"01","province_id"=>"0155","city_id"=>"015511"],
            ["id"=>"063012052","name"=>"Zone VII Pob. (Barangay 7)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"056203064","name"=>"Zone VII Pob. (Bgy. 7- Iraya)","region_id"=>"05","province_id"=>"0562","city_id"=>"056203"],
            ["id"=>"063012053","name"=>"Zone VIII Pob. (Barangay 8)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"056203065","name"=>"Zone VIII Pob. (Bgy. 8- Loyo)","region_id"=>"05","province_id"=>"0562","city_id"=>"056203"],
            ["id"=>"063012045","name"=>"Zone X Pob. (Barangay 10)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"063012046","name"=>"Zone XI Pob. (Barangay 11)","region_id"=>"06","province_id"=>"0630","city_id"=>"063012"],
            ["id"=>"126306027","name"=>"Zulueta (Bo. 7)","region_id"=>"12","province_id"=>"1263","city_id"=>"126306"],
            ["id"=>"034903086","name"=>"Zulueta District (Pob.)","region_id"=>"03","province_id"=>"0349","city_id"=>"034903"],
            ["id"=>"148105015","name"=>"Zumigui","region_id"=>"14","province_id"=>"1481","city_id"=>"148105"],
        ]);    
    }
}
