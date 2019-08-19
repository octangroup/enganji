<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    //
    protected $fillable=['user_id','product_id','quantity'];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }


    public static function addProduct(Product $product, $attributes)
    {
        if ($product->quantity >= $attributes->quantity) {
            $carts = self::firstOrNew([
                'user_id' => Auth::user()->id,
                'product_id' => $attributes->product_id,
            ]);

            $carts->quantity += $attributes->quantity;
            $carts->save();


            return true;
        }

        return false;
    }


}
