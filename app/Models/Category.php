<?php

namespace App\Models;

use App\Repository\MediaConversion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Category extends Model implements HasMedia
{
    use MediaConversion;
    protected $fillable = [
        'name',
    ];

    protected $appends = ['stripped_name'];

    public function getStrippedNameAttribute()
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', Str::lower($this->name)); // Removes special chars.
        return Str::kebab($string);
    }

    /*
     * the relationship of categories model and sub categories
     */
    public function subCategory()
    {
        return $this->subcategories();
    }

    /*
    * the relationship of categories model and sub categories
    */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function admin()
    {

        return $this->belongsTo(Admin::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
