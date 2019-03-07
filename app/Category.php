<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $table = "categories";
    /*
     * the relationship of categories model and sub categories
     */
    public function subCategory(){
        return $this->hasMany(SubCategory::class,'category_id');
    }
}
