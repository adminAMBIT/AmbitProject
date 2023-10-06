<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            'name'=>'Legal Representant',
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);
    }
}
