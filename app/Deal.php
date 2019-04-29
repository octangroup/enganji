<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    //
    protected $fillable=['product_id','price','begin_on','end_at'];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
