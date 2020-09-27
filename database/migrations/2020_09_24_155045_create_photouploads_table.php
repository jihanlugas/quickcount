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
            $table->string('file_path')->default("");
            $table->string('file_path_resize')->default("");
            $table->string('folder_name')->default("");
            $table->string('file_name')->default("");
            $table->string('alt_file')->default("");
            $table->string('ext_file')->default("");
            $table->integer('size')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);

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
