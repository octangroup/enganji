<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $fillable=['user_id','product_id','rating','title','body'];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
