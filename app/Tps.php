<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tps extends Model
{
    use SoftDeletes;

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
