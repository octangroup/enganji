<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $fillable=['name'];

    /*
     * This function defines the relationship between currency and product
     */
    public function product(){
        return $this->hasMany(Product::class);
    }
}
