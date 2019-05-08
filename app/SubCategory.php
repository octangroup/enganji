<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id','name',
    ];

    protected $appends = ['stripped_name'];

    public function getStrippedNameAttribute()
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', Str::lower($this->name)); // Removes special chars.
        return Str::kebab($string);
    }

    /*
    * the relationship of sub categories model and categories
    */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class,'subcategory_id');
    }
}
