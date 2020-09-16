<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tps extends Model
{
    use SoftDeletes;

    public function subdistrict()
    {
        return $this->belongsTo('App\Subdistrict', 'subdistrict_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo('App\Village', 'village_id', 'id');
    }
}
