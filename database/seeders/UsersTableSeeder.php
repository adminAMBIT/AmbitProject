<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=> config('configuration.default_username'),
            'is_admin'=>true,
            'password'=> bcrypt(config('configuration.default_password')),
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name'=>'Dani JJP',
            'email'=> 'dani@jjp.com',
            'company_id'=>2,
            'user_type_id'=>2,
            'password'=> bcrypt(config('configuration.default_user_password')),
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name'=>'Riba JJP',
            'email'=> 'riba@jjp.com',
            'company_id'=>2,
            'user_type_id'=>2,
            'password'=> bcrypt(config('configuration.default_user_password')),
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name'=>'Dani Lagrama',
            'email'=> 'dani@lagrama.com',
            'company_id'=>3,
            'user_type_id'=>2,
            'password'=> bcrypt(config('configuration.default_user_password')),
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name'=>'Riba Lagrama',
            'email'=> 'riba@lagrama.com',
            'company_id'=>3,
            'user_type_id'=>2,
            'password'=> bcrypt(config('configuration.default_user_password')),
            'created_at'=>'2021-01-01 00:00:00',
            'updated_at'=>'2021-01-01 00:00:00',
        ]);
    }
}
