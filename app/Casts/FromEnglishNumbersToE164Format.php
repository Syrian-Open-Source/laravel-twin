<?php



namespace App\Casts;



use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;

class FromEnglishNumbersToE164Format implements CastsAttributes
{

  /*  public $casts = [
        'english_phone' => ConvertPersianAndIndianToEnglishNumbers::class
    ];*/


    /**
     * Transform the attribute from the underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, $key, $value, array $attributes)
    {
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model,  $key, $value, array $attributes)
    {

        $convert_to_english_number = new ConvertPersianAndIndianToEnglishNumbers();

        $english_number = $convert_to_english_number->set($model , $key , $value , $attributes);

        $convert_toE164_format = new E164PhoneNumberCast();
        dd( $convert_toE164_format->set(null,'SY',$english_number,$attributes)) ;
    }
}
