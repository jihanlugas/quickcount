<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function tpss()
    {
        return $this->hasMany('App\Tps');
    }
}
