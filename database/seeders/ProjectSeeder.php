<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'title' => 'MESITA',
            'description' => 'Description 1',
        ]);

        DB::table('phases')->insert([
            'name' => 'ECONOMICA',
            'description' => 'Description 1',
            'is_private' => true,
            'project_id' => 1,
        ]);

        DB::table('phases')->insert([
            'name' => 'TECNICA',
            'description' => 'Description 1',
            'is_private' => false,
            'project_id' => 1,
        ]);

        DB::table('subphases')->insert([
            'name' => 'DESPESES DE PERSONAL',
            'description' => 'Description 1',
            'subphase_parent_id' => null,
            'phase_id' => 1,
        ]);

        DB::table('subphases')->insert([
            'name' => 'NOMINES',
            'description' => 'Description 1',
            'subphase_parent_id' => 1,
            'phase_id' => 1,
        ]);

        DB::table('subphases')->insert([
            'name' => '2023',
            'description' => 'Description 1',
            'subphase_parent_id' => 2,
            'phase_id' => 1,
        ]);

        DB::table('subphases')->insert([
            'name' => 'GENER',
            'description' => 'Description 1',
            'subphase_parent_id' => 3,
            'phase_id' => 1,
        ]);


    }
}
