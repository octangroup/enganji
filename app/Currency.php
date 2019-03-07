<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $fillable=['name'];
    protected $table='currencies';

    /*
     * This function defines the relationship between currency and product
     */
    public function product(){
        return $this->hasMany(Product::class,'currency_id');
    }
}
