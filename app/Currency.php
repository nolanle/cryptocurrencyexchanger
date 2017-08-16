<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function compare()
    {
        return $this->belongsTo('App\Currency')->first();
    }
}
