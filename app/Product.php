<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //,
    protected $fillable=['affiliate_id','name','quantity','subcategory_id','currency_id','condition_id',
        'brand_id','price','color','size','location','status','description'
        ];

    /*
   * This function defines the relationship between product and condition
   */
    public function condition(){
        return $this->belongsTo(Condition::class,'condition_id');
    }
    /*
     * This function defines the relationship between product and currency
     */
    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }
    /*
  * This function defines the relationship between product and brand
  */
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

}
