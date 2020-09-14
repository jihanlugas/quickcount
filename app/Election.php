<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Election extends Model
{
    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function peroidstart()
    {
        return $this->belongsTo('App\Peroid', 'start', 'id');
    }

    public function peroidend()
    {
        return $this->belongsTo('App\Peroid', 'end', 'id');
    }
}
