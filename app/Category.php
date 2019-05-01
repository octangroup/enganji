<?php

namespace App;

use App\Repository\MediaConversion;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Category extends Model implements HasMedia
{
    use MediaConversion;
    protected $fillable = [
        'name',
    ];
    /*
     * the relationship of categories model and sub categories
     */
    public function subCategory(){
        return $this->hasMany(SubCategory::class);
    }

    public function admin(){

        return $this->belongsTo(Admin::class);
    }
    public function Product(){
        return $this->hasMany(Product::class,'category_id');
    }
}
