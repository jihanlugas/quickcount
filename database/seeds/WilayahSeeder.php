<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_pre = microtime(true);
        $this->command->info('Inserting provinces ...');
        $path = 'database/sql/provinces.sql';
        DB::unprepared(file_get_contents($path));
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Inserting districts ...');
        $path = 'database/sql/districts.sql';
        DB::unprepared(file_get_contents($path));
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Inserting subdistricts ...');
        $path = 'database/sql/subdistricts.sql';
        DB::unprepared(file_get_contents($path));
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");

        $time_pre = microtime(true);
        $this->command->info('Inserting villages ...');
        $path = 'database/sql/villages.sql';
        DB::unprepared(file_get_contents($path));
        $time_post = microtime(true);
        $this->command->info("Success " . number_format($time_post - $time_pre, 2) . " seconds");
    }
}
