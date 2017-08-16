<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 8/16/2017
 * Time: 8:51 AM
 */

namespace App;


class HelperService
{
    public static function createWallet($user){
        // create user wallet
        $currencies = Currency::all();
        $result = array();
        foreach ($currencies as $currency)
        {
            $wallet = Wallet::create([
                'user_id' => $user->id,
                'currency_id' => $currency->id,
                'amount' => 0
            ]);
            array_push($result, $wallet);
        }
        return $result;
    }

}