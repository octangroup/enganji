<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable=['name'];

    /*
     * This function defines the relationship between condition and products
     */
    public function product(){
       return $this->hasMany(Product::class);
    }
}
