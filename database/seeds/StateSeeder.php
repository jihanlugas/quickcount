<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Province;
use App\District;
use App\Subdistrict;
use App\Village;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            [
                "name" => "Riau",
                "districts" => [
                    [
                        "name" => "Pekanbaru",
                        "subdistricts" => [
                            [
                                'name' => 'Tampan',
                                'villages' => [
                                    "Swakarya",
                                    "Cipta Karya",
                                ],
                            ],
                            [
                                'name' => 'Suka Jadi',
                                'villages' => [
                                    "Pasar Bawah",
                                ],
                            ],
                        ],
                    ],
                    [
                        "name" => "Kepulauan Meranti",
                        "subdistricts" => [
                            [
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
                        ],
                    ],
                ],
            ],
            [
                "name" => "Sumatera Barat",
                "districts" => [
                    [
                        "name" => "Padang",
                        "subdistricts" => [
                            [
                                "name" => "Padang Kota",
                                "villages" => [
                                    "Pusat Kota",
                                ],
                            ]
                        ],
                    ],
                    [
                        "name" => "50 Kota",
                        "subdistricts" => [
                            [
                                "name" => "Akabiluru",
                                "villages" => [
                                    "Batu Hampar",
                                    "Batu Tanyuah",
                                    "Tambun Ijuak",
                                ],
                            ]
                        ],
                    ],
                    [
                        "name" => "Agam",
                        "subdistricts" => [
                            [
                                "name" => "Bukitinngi",
                                "villages" => [],
                            ]
                        ],
                    ],
                ],
            ],
            [
                "name" => "Kepulauan Riau",
                "districts" => [
                    [
                        "name" => "Bintan",
                        "subdistricts" => [
                            [
                                "name" => "Bintan Pesisir",
                                "villages" => [
                                    "Air Gelubi",
                                    "Kelong",
                                    "Mapur",
                                    "Numbing",
                                ],
                            ],
                            [
                                "name" => "Bintan Timur",
                                "villages" => [
                                    "Gunung Lengkuas",
                                    "Kijang Kota",
                                    "Sungai Enam",
                                    "Sungai Lekop",
                                ],
                            ],
                            [
                                "name" => "Bintan Utara",
                                "villages" => [
                                    "Lancang Kuning",
                                    "Tanjung Uban Kota",
                                    "Tanjung Uban Timur",
                                    "Tanjung Uban Selatan",
                                    "Tanjung Uban Utara",
                                ],
                            ],
                            [
                                "name" => "Gunung Kijang",
                                "villages" => [
                                    "Gunung Kijang",
                                    "Kawal",
                                    "Malang Rapat",
                                    "Teluk Bakau",
                                ],
                            ],
                            [
                                "name" => "Mantang",
                                "villages" => [
                                    "Dendun",
                                    "Mantang Baru",
                                    "Mantang Besar",
                                    "Mantang Lama",
                                ],
                            ],
                            [
                                "name" => "Seri Kuala Lobam",
                                "villages" => [
                                    "Busung",
                                    "Kuala Sempang",
                                    "Tanjung Permai",
                                    "Teluk Lobam",
                                    "Teluk Sasah",
                                ],
                            ],
                            [
                                "name" => "Tambelan",
                                "villages" => [
                                    "Batu Lepuk",
                                    "Kampung Hilir",
                                    "Kampung Melayu",
                                    "Kukup",
                                    "Pulau Mentebung",
                                    "Pulau Pengiki",
                                    "Pulau Pinang",
                                    "Teluk Sekuni",
                                ],
                            ],
                            [
                                "name" => "Telok Sebong",
                                "villages" => [
                                    "Berakit",
                                    "Ekang Anculai",
                                    "Kota Baru",
                                    "Pengundang",
                                    "Sebong Lagoi",
                                    "Sebong Pereh",
                                    "Sri Bintan",
                                ],
                            ],
                            [
                                "name" => "Teluk Bintan",
                                "villages" => [
                                    "Bintan Buyu",
                                    "Pangkil",
                                    "Penaga",
                                    "Pengujan",
                                    "Tembeling",
                                    "Tembeling Tanjung",
                                ],
                            ],
                            [
                                "name" => "Toapaya",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                        ]
                    ],
                    [
                        "name" => "Karimun",
                        "subdistricts" => [
                            [
                                "name" => "Belat",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Buru",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Durai",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Karimun",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Kundur",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Kundur Barat",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Kundur Utara",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Meral",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Meral Barat",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Moro",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Tebing",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                            [
                                "name" => "Ungar",
                                "villages" => [
                                    "Toapaya",
                                    "Toapaya Sari",
                                    "Toapaya Selatan",
                                    "Toapaya Utara",
                                ],
                            ],
                        ]
                    ],
                    [
                        "name" => "Pelupauan Anambas",
                        "subdistricts" => [

                        ]
                    ],
                    [
                        "name" => "Kota Batam",
                        "subdistricts" => [

                        ]
                    ],
                    [
                        "name" => "Kota Tanjung Pinang",
                        "subdistricts" => [

                        ]
                    ],
                    [
                        "name" => "Lingga",
                        "subdistricts" => [

                        ]
                    ],
                    [
                        "name" => "Natuna",
                        "subdistricts" => [

                        ]
                    ],
                ],
            ],
            [
                "name" => "Jawa Barat",
                "districts" => [
                    [
                        "name" => "Tasikmalaya",
                        "districts" => []
                    ],
                ],
            ],
            [
                "name" => "Banten",
                "districts" => [
                    [
                        "name" => "Pandeglang",
                        "districts" => []
                    ],
                ],
            ],
        ];


        foreach ($provinces as $province_key => $province) {
            $mProvince = new Province;
            $mProvince->name = $province['name'];
            $mProvince->save();
            foreach ($province['districts'] as $district_key => $district) {
                $mDistrict = new District;
                $mDistrict->province_id = $mProvince->id;
                $mDistrict->name = $district['name'];
                $mDistrict->save();
                foreach ($district['subdistricts'] as $subdistrict_key => $subdistrict) {
                    $mSubdistrict = new Subdistrict;
                    $mSubdistrict->province_id = $mProvince->id;
                    $mSubdistrict->district_id = $mDistrict->id;
                    $mSubdistrict->name = $subdistrict['name'];
                    $mSubdistrict->save();
                    foreach ($subdistrict['villages'] as $village_key => $village) {
                        $mVillage = new Village;
                        $mVillage->province_id = $mProvince->id;
                        $mVillage->district_id = $mDistrict->id;
                        $mVillage->subdistrict_id = $mSubdistrict->id;
                        $mVillage->name = $village;
                        $mVillage->save();
                    }
                }
            }
        }

//        foreach ($subdistricts as $subdistrict) {
//            DB::table('subdistricts')->insert([
//                'id' => $subdistrict['id'],
//                'district_id' => 1,
//                'name' => $subdistrict['name'],
//            ]);
//            foreach ($subdistrict['villages'] as $village) {
//                DB::table('villages')->insert([
//                    'district_id' => 1,
//                    'subdistrict_id' => $subdistrict['id'],
//                    'name' => $village,
//                ]);
//            }
//        }
    }
}
