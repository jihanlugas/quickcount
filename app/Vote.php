<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;

    const STATUS_NAME = [
        self::VOTE_STATUS_WAITING_ID => 'Menunggu',
        self::VOTE_STATUS_APPROVE_ID => 'Diterima',
        self::VOTE_STATUS_REJECT_ID => 'Ditolak',
    ];
    const VOTE_STATUS_WAITING_ID = 1;
    const VOTE_STATUS_APPROVE_ID = 2;
    const VOTE_STATUS_REJECT_ID = 3;

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

    public function tps()
    {
        return $this->belongsTo('App\Tps', 'tps_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
