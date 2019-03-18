<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;;

class Product extends Model implements HasMedia
{
    use  HasMediaTrait;
    //,
    protected $fillable=['affiliate_id','subcategory_id','currency_id','condition_id',
        'brand_id','name','quantity','price','color','size','status','description'
        ];

    /*
   * This function defines the relationship between product and condition
   */
    public function condition(){
        return $this->belongsTo(Condition::class);
    }
    /*
     * This function defines the relationship between product and currency
     */
    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    /*
  * This function defines the relationship between product and brand
  */
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class);
    }

    public function thumbnail()
    {
        if ($this->getFirstMedia()) {
            return $this->getFirstMedia()->getUrl('thumb');
        }
        return null;
    }

    public function cover()
    {
        if ($this->getFirstMedia()) {
            return $this->getFirstMedia()->getUrl('main');
        }
        return null;
    }

    public function registerMediaConversions(Media $media = null){

        $this->addMediaConversion('thumb')
            ->fit('fill', 480, 480);
        $this->addMediaConversion('main')
            ->fit('fill', 960, 960);
    }
}
