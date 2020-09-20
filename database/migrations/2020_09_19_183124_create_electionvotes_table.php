<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electionvotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id');
            $table->foreignId('province_id');
            $table->foreignId('district_id');
            $table->foreignId('subdistrict_id');
            $table->foreignId('village_id');
            $table->foreignId('tps_id');
            $table->foreignId('candidate_id');
            $table->foreignId('vote_id');
            $table->foreignId('user_id');
            $table->integer('vote');
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
        Schema::dropIfExists('electionvotes');
    }
}
