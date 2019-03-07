<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable=['name'];
    protected $table='conditions';

    /*
     * This function defines the relationship between condition and products
     */
    public function product(){
       return $this->hasMany(Product::class,'condition_id');
    }
}
