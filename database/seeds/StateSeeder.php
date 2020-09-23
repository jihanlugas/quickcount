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
        $this->command->info('Update villages.subdistrict_id 1/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 10000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 1/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 2/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 20000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 2/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 3/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 30000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 3/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 4/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 40000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 4/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 5/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 50000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 5/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 6/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 60000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 6/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 7/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 70000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 7/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 8/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 80000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 8/9 " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Update villages.subdistrict_id 9/9 ...');
        DB::update("UPDATE villages
                        JOIN subdistricts ON villages.code LIKE CONCAT(subdistricts.code, '%')
                        SET villages.subdistrict_id = subdistricts.id
                        WHERE villages.id BETWEEN 0 AND 90000
                        AND villages.subdistrict_id = 0");
        $time_post = microtime(true);
        $this->command->info("Success 9/9 " . number_format($time_post - $time_pre, 2) . " seconds");
    }
}
