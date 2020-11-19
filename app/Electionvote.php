<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electionvote extends Model
{
    public function candidate()
    {
        return $this->belongsTo('App\Candidate', 'candidate_id', 'id');
    }

    public function election()
    {
        return $this->belongsTo('App\Election', 'election_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }

    public function subdistrict()
    {
        return $this->belongsTo('App\Subdistrict', 'subdistrict_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo('App\Village', 'village_id', 'id');
    }
}
