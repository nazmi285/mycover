<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'payment_no',
    ];
    
    public function paymentable()
    {
        return $this->morphTo();
    }

    public static function paymentNo(){

        $payment_no = 'PAY_'.random_str('8','1234567890');

        if(!empty($payment_no) && ! static::where('payment_no', $payment_no)->count()){
            $payment = static::create(['payment_no'=>$payment_no]); 
            return $payment;
        }else{
            static::paymentNo();
        }
    }
}
