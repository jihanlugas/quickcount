<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id');
            $table->foreignId('province_id');
            $table->foreignId('district_id');
            $table->foreignId('subdistrict_id');
            $table->foreignId('village_id');
            $table->foreignId('tps_id');
            $table->foreignId('user_id');
            $table->string('status')->default("1");
            $table->integer('suara_sah')->default(0);
            $table->integer('suara_tidak_sah')->default(0);
            $table->integer('total_suara')->default(0);
            $table->tinyInteger('has_vote')->default(0);
            $table->foreignId('photo_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
