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
        $time_pre = microtime(true);
        $this->command->info('Insert provinces ...');
        DB::insert("INSERT INTO provinces (name, code)
                        SELECT wilayahs.name, wilayahs.code
                        FROM wilayahs
                        WHERE LENGTH(wilayahs.code) > 1
                        AND LENGTH(wilayahs.code) < 4");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Insert districts ...');
        DB::insert("INSERT INTO districts (name, code)
                        SELECT wilayahs.name, wilayahs.code
                        FROM wilayahs
                        WHERE LENGTH(wilayahs.code) > 4
                        AND LENGTH(wilayahs.code) < 7");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Insert subdistricts ...');
        DB::insert("INSERT INTO subdistricts (name, code)
                        SELECT wilayahs.name, wilayahs.code
                        FROM wilayahs
                        WHERE LENGTH(wilayahs.code) > 7
                        AND LENGTH(wilayahs.code) < 10");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Insert villages ...');
        DB::insert("INSERT INTO villages (name, code)
                        SELECT wilayahs.name, wilayahs.code
                        FROM wilayahs
                        WHERE LENGTH(wilayahs.code) > 10
                        AND LENGTH(wilayahs.code) < 17");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update districts.province_id. ...');
        DB::update("UPDATE districts
                        JOIN provinces ON districts.code LIKE CONCAT(provinces.code, '%')
                        SET districts.province_id = provinces.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update subdistricts.province_id ...');
        DB::update("UPDATE subdistricts
                        JOIN provinces ON subdistricts.code LIKE CONCAT(provinces.code, '%')
                        SET subdistricts.province_id = provinces.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update subdistricts.district_id ...');
        DB::update("UPDATE subdistricts
                        JOIN districts ON subdistricts.code LIKE CONCAT(districts.code, '%')
                        SET subdistricts.district_id = districts.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.province_id ...');
        DB::update("UPDATE villages
                        JOIN provinces ON villages.code LIKE CONCAT(provinces.code, '%')
                        SET villages.province_id = provinces.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.district_id ...');
        DB::update("UPDATE villages
                        JOIN districts ON villages.code LIKE CONCAT(districts.code, '%')
                        SET villages.district_id = districts.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id");
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");
    }
}
