<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class initSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jihan Lugas',
            'email' => 'jihanlugas2@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '1',
        ]);

        foreach (['2020', '2021', '2022', '2023', '2024', '2025'] as $peroid) {
            DB::table('peroids')->insert([
                'name' => $peroid,
            ]);
        }

        foreach (['Presiden', 'Gubernur', 'Walikota', 'Bupati'] as $positions) {
            DB::table('positions')->insert([
                'name' => $positions,
            ]);
        }
    }
}
