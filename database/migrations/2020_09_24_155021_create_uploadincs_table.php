<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadincsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadincs', function (Blueprint $table) {
            $table->id();
            $table->integer('ref_tableid');
            $table->integer('folder_inc');
            $table->string('folder_name');
            $table->integer('running');
            $table->timestamps();
            $table->unique(['ref_tableid', 'folder_inc']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploadincs');
    }
}
