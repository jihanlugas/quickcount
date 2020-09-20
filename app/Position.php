<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    //
    use SoftDeletes;

    const POSSITION_PRESIDENT_ID = 1;
    const POSSITION_GUBERNUR_ID = 2;
    const POSSITION_BUPATI_ID = 3;
    const POSSITION_WALIKOTA_ID = 4;
}
