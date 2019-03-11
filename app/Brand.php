<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];
    protected  $table ='brands';
    /*
     * This function defines the relationship between Brand and product
     */
    public function product(){
        return $this->hasMany(Product::class,'brand_id');
    }
}
