<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_provinces')->insert([
	        [
	            "id" => "1401",
	            "name" => "ABRA",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "1602",
	            "name" => "AGUSAN DEL NORTE",
	            "region_id" => "16",
	        ],
	        [
	            "id" => "1603",
	            "name" => "AGUSAN DEL SUR",
	            "region_id" => "16",
	        ],
	        [
	            "id" => "0604",
	            "name" => "AKLAN",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "0505",
	            "name" => "ALBAY",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "0606",
	            "name" => "ANTIQUE",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "1481",
	            "name" => "APAYAO",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "0377",
	            "name" => "AURORA",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "1507",
	            "name" => "BASILAN",
	            "region_id" => "15",
	        ],
	        [
	            "id" => "0308",
	            "name" => "BATAAN",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "0209",
	            "name" => "BATANES",
	            "region_id" => "02",
	        ],
	        [
	            "id" => "0410",
	            "name" => "BATANGAS",
	            "region_id" => "04",
	        ],
	        [
	            "id" => "1411",
	            "name" => "BENGUET",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "0878",
	            "name" => "BILIRAN",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "0712",
	            "name" => "BOHOL",
	            "region_id" => "07",
	        ],
	        [
	            "id" => "1013",
	            "name" => "BUKIDNON",
	            "region_id" => "10",
	        ],
	        [
	            "id" => "0314",
	            "name" => "BULACAN",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "0215",
	            "name" => "CAGAYAN",
	            "region_id" => "02",
	        ],
	        [
	            "id" => "0516",
	            "name" => "CAMARINES NORTE",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "0517",
	            "name" => "CAMARINES SUR",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "1018",
	            "name" => "CAMIGUIN",
	            "region_id" => "10",
	        ],
	        [
	            "id" => "0619",
	            "name" => "CAPIZ",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "0520",
	            "name" => "CATANDUANES",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "0421",
	            "name" => "CAVITE",
	            "region_id" => "04",
	        ],
	        [
	            "id" => "0722",
	            "name" => "CEBU",
	            "region_id" => "07",
	        ],
	        [
	            "id" => "0997",
	            "name" => "CITY OF ISABELA",
	            "region_id" => "09",
	        ],
	        [
	            "id" => "1339",
	            "name" => "CITY OF MANILA",
	            "region_id" => "13",
	        ],
	        [
	            "id" => "1182",
	            "name" => "COMPOSTELA VALLEY",
	            "region_id" => "11",
	        ],
	        [
	            "id" => "1247",
	            "name" => "COTABATO (NORTH COTABATO)",
	            "region_id" => "12",
	        ],
	        [
	            "id" => "1298",
	            "name" => "COTABATO CITY",
	            "region_id" => "12",
	        ],
	        [
	            "id" => "1123",
	            "name" => "DAVAO DEL NORTE",
	            "region_id" => "11",
	        ],
	        [
	            "id" => "1124",
	            "name" => "DAVAO DEL SUR",
	            "region_id" => "11",
	        ],
	        [
	            "id" => "1186",
	            "name" => "DAVAO OCCIDENTAL",
	            "region_id" => "11",
	        ],
	        [
	            "id" => "1125",
	            "name" => "DAVAO ORIENTAL",
	            "region_id" => "11",
	        ],
	        [
	            "id" => "1685",
	            "name" => "DINAGAT ISLANDS",
	            "region_id" => "16",
	        ],
	        [
	            "id" => "0826",
	            "name" => "EASTERN SAMAR",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "0679",
	            "name" => "GUIMARAS",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "1427",
	            "name" => "IFUGAO",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "0128",
	            "name" => "ILOCOS NORTE",
	            "region_id" => "01",
	        ],
	        [
	            "id" => "0129",
	            "name" => "ILOCOS SUR",
	            "region_id" => "01",
	        ],
	        [
	            "id" => "0630",
	            "name" => "ILOILO",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "0231",
	            "name" => "ISABELA",
	            "region_id" => "02",
	        ],
	        [
	            "id" => "1432",
	            "name" => "KALINGA",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "0133",
	            "name" => "LA UNION",
	            "region_id" => "01",
	        ],
	        [
	            "id" => "0434",
	            "name" => "LAGUNA",
	            "region_id" => "04",
	        ],
	        [
	            "id" => "1035",
	            "name" => "LANAO DEL NORTE",
	            "region_id" => "10",
	        ],
	        [
	            "id" => "1536",
	            "name" => "LANAO DEL SUR",
	            "region_id" => "15",
	        ],
	        [
	            "id" => "0837",
	            "name" => "LEYTE",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "1538",
	            "name" => "MAGUINDANAO",
	            "region_id" => "15",
	        ],
	        [
	            "id" => "1740",
	            "name" => "MARINDUQUE",
	            "region_id" => "17",
	        ],
	        [
	            "id" => "0541",
	            "name" => "MASBATE",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "1042",
	            "name" => "MISAMIS OCCIDENTAL",
	            "region_id" => "10",
	        ],
	        [
	            "id" => "1043",
	            "name" => "MISAMIS ORIENTAL",
	            "region_id" => "10",
	        ],
	        [
	            "id" => "1444",
	            "name" => "MOUNTAIN PROVINCE",
	            "region_id" => "14",
	        ],
	        [
	            "id" => "1340",
	            "name" => "NCR, CITY OF MANILA, FIRST DISTRICT",
	            "region_id" => "13",
	        ],
	        [
	            "id" => "1376",
	            "name" => "NCR, FOURTH DISTRICT",
	            "region_id" => "13",
	        ],
	        [
	            "id" => "1374",
	            "name" => "NCR, SECOND DISTRICT",
	            "region_id" => "13",
	        ],
	        [
	            "id" => "1375",
	            "name" => "NCR, THIRD DISTRICT",
	            "region_id" => "13",
	        ],
	        [
	            "id" => "0645",
	            "name" => "NEGROS OCCIDENTAL",
	            "region_id" => "06",
	        ],
	        [
	            "id" => "0746",
	            "name" => "NEGROS ORIENTAL",
	            "region_id" => "07",
	        ],
	        [
	            "id" => "0848",
	            "name" => "NORTHERN SAMAR",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "0349",
	            "name" => "NUEVA ECIJA",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "0250",
	            "name" => "NUEVA VIZCAYA",
	            "region_id" => "02",
	        ],
	        [
	            "id" => "1751",
	            "name" => "OCCIDENTAL MINDORO",
	            "region_id" => "17",
	        ],
	        [
	            "id" => "1752",
	            "name" => "ORIENTAL MINDORO",
	            "region_id" => "17",
	        ],
	        [
	            "id" => "1753",
	            "name" => "PALAWAN",
	            "region_id" => "17",
	        ],
	        [
	            "id" => "0354",
	            "name" => "PAMPANGA",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "0155",
	            "name" => "PANGASINAN",
	            "region_id" => "01",
	        ],
	        [
	            "id" => "0456",
	            "name" => "QUEZON",
	            "region_id" => "04",
	        ],
	        [
	            "id" => "0257",
	            "name" => "QUIRINO",
	            "region_id" => "02",
	        ],
	        [
	            "id" => "0458",
	            "name" => "RIZAL",
	            "region_id" => "04",
	        ],
	        [
	            "id" => "1759",
	            "name" => "ROMBLON",
	            "region_id" => "17",
	        ],
	        [
	            "id" => "0860",
	            "name" => "SAMAR (WESTERN SAMAR)",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "1280",
	            "name" => "SARANGANI",
	            "region_id" => "12",
	        ],
	        [
	            "id" => "0761",
	            "name" => "SIQUIJOR",
	            "region_id" => "07",
	        ],
	        [
	            "id" => "0562",
	            "name" => "SORSOGON",
	            "region_id" => "05",
	        ],
	        [
	            "id" => "1263",
	            "name" => "SOUTH COTABATO",
	            "region_id" => "12",
	        ],
	        [
	            "id" => "0864",
	            "name" => "SOUTHERN LEYTE",
	            "region_id" => "08",
	        ],
	        [
	            "id" => "1265",
	            "name" => "SULTAN KUDARAT",
	            "region_id" => "12",
	        ],
	        [
	            "id" => "1566",
	            "name" => "SULU",
	            "region_id" => "15",
	        ],
	        [
	            "id" => "1667",
	            "name" => "SURIGAO DEL NORTE",
	            "region_id" => "16",
	        ],
	        [
	            "id" => "1668",
	            "name" => "SURIGAO DEL SUR",
	            "region_id" => "16",
	        ],
	        [
	            "id" => "0369",
	            "name" => "TARLAC",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "1570",
	            "name" => "TAWI-TAWI",
	            "region_id" => "15",
	        ],
	        [
	            "id" => "0371",
	            "name" => "ZAMBALES",
	            "region_id" => "03",
	        ],
	        [
	            "id" => "0972",
	            "name" => "ZAMBOANGA DEL NORTE",
	            "region_id" => "09",
	        ],
	        [
	            "id" => "0973",
	            "name" => "ZAMBOANGA DEL SUR",
	            "region_id" => "09",
	        ],
	        [
	            "id" => "0983",
	            "name" => "ZAMBOANGA SIBUGAY",
	            "region_id" => "09",
	        ]
        ]);
    }
}
