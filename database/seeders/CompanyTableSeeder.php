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
            'email'=>'info@ambit.com',
            'country'=>'Spain',
            'street_address'=>'Major, 1',
            'city'=>'La Senia',
            'province'=>'Tarragona',
            'postal_code'=>'43560',
        ]);

        DB::table('companies')->insert([
            'name'=>'JJP ',
            'cif'=>'B-12345672',
            'email'=>'info@jjp.com',
            'country'=>'Spain',
            'street_address'=>'Major, 2',
            'city'=>'Ulldecona',
            'province'=>'Tarragona',
            'postal_code'=>'43550',
        ]);

        DB::table('companies')->insert([
            'name'=>'Lagrama',
            'cif'=>'B-123456745',
            'email'=>'info@lagrama.com',
            'country'=>'Spain',
            'street_address'=>'Major, 234',
            'city'=>'Ulldecona',
            'province'=>'Tarragona',
            'postal_code'=>'43550',
        ]);
    }
}
