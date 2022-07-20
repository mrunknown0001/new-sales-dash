<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'id' => 1,
            'password' => null,
            'role' => 'superuser',
        ]);

        $this->call(RegionsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BarangaysTableSeeder::class);
        $this->call(BarangaysTableSeeder2::class);
        $this->call(BarangaysTableSeeder3::class);
        $this->call(BarangaysTableSeeder4::class);
        $this->call(BarangaysTableSeeder5::class);
        $this->call(BarangaysTableSeeder6::class);
        $this->call(BarangaysTableSeeder7::class);
        $this->call(BarangaysTableSeeder8::class);
        $this->call(BarangaysTableSeeder9::class);
        $this->call(BarangaysTableSeeder10::class);
        $this->call(BarangaysTableSeeder11::class);
        $this->call(BarangaysTableSeeder12::class);
        $this->call(BarangaysTableSeeder13::class);
        $this->call(BarangaysTableSeeder14::class);
        $this->call(BarangaysTableSeeder15::class);
        $this->call(BarangaysTableSeeder16::class);
        $this->call(BarangaysTableSeeder17::class);
        $this->call(BarangaysTableSeeder18::class);
        $this->call(BarangaysTableSeeder19::class);
        $this->call(BarangaysTableSeeder20::class);
        $this->call(BarangaysTableSeeder21::class);
        $this->call(BarangaysTableSeeder22::class);
        
        $this->call(PfcRegionsTableSeeder::class);
    }
}
