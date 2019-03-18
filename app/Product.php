<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //,
    protected $fillable=['affiliate_id','subcategory_id','currency_id','condition_id',
        'brand_id','name','quantity','price','color','size','status','description'
        ];

    /*
   * This function defines the relationship between product and condition
   */
    public function condition(){
        return $this->belongsTo(Condition::class);
    }
    /*
     * This function defines the relationship between product and currency
     */
    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    /*
  * This function defines the relationship between product and brand
  */
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class);
    }
}
