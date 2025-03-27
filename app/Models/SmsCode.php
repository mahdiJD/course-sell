<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SmsCode extends Model
{
    protected $fillable = [
        'mobile',
        'code',
        'updated_at'
    ];
    public static function checkTowMin($mobile){
        $check = self::query()->where('mobile',$mobile)->
            where('created_at','>',Carbon::now()->subMinute())->first();
        return $check;
    }

    public static function createSmsCode($mobile,$code){
        // self::query()->
    }
}
