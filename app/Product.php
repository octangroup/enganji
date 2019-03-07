<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //,
    protected $fillable=['affiliate_id','name','quantity','subcategory_id','currency_id','condition_id',
        'brand_id','price','color','size','location','active','description'
        ];

    /*
   * This function defines the relationship between product and condition
   */
    public function condition(){
        return $this->belongsTo(Condition::class,'condition_id');
    }
}
