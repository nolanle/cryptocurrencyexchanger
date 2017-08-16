<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'currency_id','amount', 'wallet_address',
    ];


    public function user()
    {
        return $this->belongsTo('App\User')->first();
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency')->first();
    }

}
