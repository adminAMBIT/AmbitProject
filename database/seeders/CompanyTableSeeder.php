<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name'=>'AMBIT ',
            'cif'=>'B-12345678',
            'email'=>'info@ambit',
            'country'=>'Spain',
            'street_address'=>'Major, 1',
            'city'=>'La Senia',
            'province'=>'Tarragona',
            'postal_code'=>'43560',
        ]);
    }
}
