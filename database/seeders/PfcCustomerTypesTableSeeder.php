<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PfcCustomerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pfc_customer_types')->insert([
        	[
        		'customer_type_name' => 'HRI',
        		'customer_type_description' => 'Hotel, Restaurant and Institutions'
        	],
        	[
        		'customer_type_name' => 'BDO',
        		'customer_type_description' => 'Board of Directors'
        	],
        	[
        		'customer_type_name' => 'EMPLOYEE',
        		'customer_type_description' => 'BGC EMPLOYEE'
        	],
        	[
        		'customer_type_name' => 'CS',
        		'customer_type_description' => ''
        	],
        	[
        		'customer_type_name' => 'WHOLESALE',
        		'customer_type_description' => 'WHOLESALE'
        	],
        	[
        		'customer_type_name' => 'RETAIL',
        		'customer_type_description' => 'RETAIL'
        	]
        ]);
    }
}
