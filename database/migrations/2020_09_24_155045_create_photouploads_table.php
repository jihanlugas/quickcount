<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotouploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photouploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ref_type');
            $table->foreignId('ref_id');
            $table->string('file_path');
            $table->string('folder_name');
            $table->string('file_name');
            $table->string('alt_file');
            $table->string('ext_file');
            $table->integer('size');
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photouploads');
    }
}
