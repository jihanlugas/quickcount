<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subdistricts = [
            [
                'id' => "1",
                'name' => 'Merbau',
                'villages' => [
                    "Bagan Melibur",
                    "Bandul",
                    "Mekar Sari",
                    "Dedap",
                    "Tanjung Padang",
                    "Kulap",
                    "Lukit",
                    "Mengkirau",
                    "Mengkopot",
                    "Meranti Bunting",
                    "Pelantai",
                    "Tanjung Kulim",
                    "Selat Akar",
                    "Teluk Belitung",
                ],
            ],
            [

                'id' => "2",
                'name' => 'Pulau Merbau',
                'villages' => [
                    "Baran Melintang",
                    "Centai",
                    "Kuala Merbau",
                    "Renak Rungun",
                    "Semukut",
                    "Tanjung Bunga",
                    "Teluk Ketapang",
                ],
            ],
            [
                'id' => "3",
                'name' => 'Rangsang',
                'villages' => [
                    "Beting",
                    "Bungur",
                    "Kemala Sari",
                    "Pengayun",
                    "Ransang",
                    "Repan",
                    "Sokop",
                    "Sungai Gayun",
                    "Tanjung Bakau",
                    "Tanjung Kedabu",
                    "Tanjung Medang",
                    "TebunTopang",
                    "Tanjung Samak",
                ],
            ],
            [
                'id' => "4",
                'name' => 'Rangsang Barat',
                'villages' => [
                    "Anak Setatah",
                    "Bantar",
                    "Bina Maju",
                    "Bokor",
                    "Kayu Ara",
                    "Kedabu Rapat",
                    "Lemang",
                    "Melai",
                    "Rangsang",
                    "Sei Goming",
                    "Sendaur",
                    "Sialang Pasung",
                    "Sonde",
                    "Sungai Cina",
                    "Tanah Merah",
                    "Telaga Baru",
                ],
            ],
            [
                'id' => "5",
                'name' => 'Tebing Tinggi',
                'villages' => [
                    "Alah Air",
                    "Alah Air Timur",
                    "Banglas",
                    "Banglas Barat",
                    "Sesap",
                    "Selat Panjang Barat",
                    "Selat Panjang Kota",
                    "Selat Panjang Selatan",
                    "Selat Panjang Timur",
                ],
            ],
            [
                'id' => "6",
                'name' => 'Tebing Tinggi Barat',
                'villages' => [
                    "Alai",
                    "Batang Malas",
                    "Insit",
                    "Kundur",
                    "Lalang Tanjung",
                    "Maini",
                    "Mekong",
                    "Mengkikip",
                    "Sesap",
                    "Tanjung Peranap",
                    "Tenan",
                ],
            ],
            [
                'id' => "7",
                'name' => 'Tebing Tinggi Timur',
                'villages' => [
                    "Kepau Baru",
                    "Lukun",
                    "Nipah Sendanu",
                    "Sungai Tohor",
                    "Tanjung Gadai",
                    "Tanjung Sari",
                    "Teluk Buntal",
                ],
            ]
        ];

        foreach ($subdistricts as $subdistrict) {
            DB::table('subdistricts')->insert([
                'id' => $subdistrict['id'],
                'district_id' => 1,
                'name' => $subdistrict['name'],
            ]);
            foreach ($subdistrict['villages'] as $village) {
                DB::table('villages')->insert([
                    'district_id' => 1,
                    'subdistrict_id' => $subdistrict['id'],
                    'name' => $village,
                ]);
            }
        }
    }
}
