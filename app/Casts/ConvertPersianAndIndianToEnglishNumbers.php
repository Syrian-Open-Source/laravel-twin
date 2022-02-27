<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;

class ConvertPersianAndIndianToEnglishNumbers implements CastsAttributes
{
/*
*Cast the given value.
* @param  \Illuminate\Database\Eloquent\Model  $model
* @param  string  $key
* @param  mixed  $value
* @param  array  $attributes
* @return array
*/
    public function get($model,$key, $value, $attributes)
    {
        return (string)$value;
    }

/* Prepare the given value for storage.
*
* @param  \Illuminate\Database\Eloquent\Model  $model
* @param  string  $key
* @param  array  $value
* @param  array  $attributes
* @return string
*/
    public function set($model, $key, $value, $attributes)
    {

        return  (string)strtr((string)$value, array('+'=>'+', '۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
//        $convert_toE164_format = new E164PhoneNumberCast();
        //dd($convert_toE164_format->set($model,$key,$result,$attributes)) ;

    }
}
