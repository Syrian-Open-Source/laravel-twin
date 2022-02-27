<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class JsonCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  String  $value
     * @param  array  $attributes
//     * @return array
     */
    public function get($model, $key, $value ,$attributes)
    {
        return json_decode($value, true);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return String
     */
    public function set($model, $key, $value, $attributes): string
    {
        return json_encode($value,true);
    }
}
