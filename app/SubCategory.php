<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id','name',
    ];
    protected $table='sub_categories';

    /*
    * the relationship of sub categories model and categories
    */
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
