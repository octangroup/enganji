<?php

namespace App;

use App\Repository\MediaConversion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

/**
 * @property bool status
 */
class Product extends Model implements HasMedia
{
    use MediaConversion;

    protected $fillable = ['affiliate_id', 'subcategory_id', 'currency_id', 'condition_id',
        'brand_id', 'name', 'quantity', 'price', 'color', 'size', 'status', 'description'
    ];

    /*
   * This function defines the relationship between product and condition
   */
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    /*
     * This function defines the relationship between product and currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /*
  * This function defines the relationship between product and brand
  */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /*
    * This function defines the relationship between product and brand
    */
    public function reviews(){
        return $this->hasMany(Review::class,'product_id');
    }


    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function wishLists(){

        return $this->hasMany(WishList::class);
    }


//function to check the status of the affiliate
    public function isActive(): bool
    {
        return $this->status == true;
    }

//function to activate the status of the affiliate
    public function activate(): void
    {
        $this->status = true;
        $this->save();
    }

//function to deactivate the status of the affiliate
    public function deactivate(): void
    {
        $this->status = false;
        $this->save();
    }


    public function scopeWhereActivated($query){
        return $query->where('status',1);
    }

    public function visits(){
        return $this->hasMany(Visits::class,'product_id');
    }


    public function incrementVisits(){
        $this->visits()->create();

    }

    public function scopeForAffiliate($query, $affiliate = null)
    {
        if (!$affiliate) {
            $affiliate = Auth::guard('affiliate')->user();
        }
        return $query->where('affiliate_id', $affiliate->id);
    }

    public function isInWishList()
    {
        return $this->wishLists()->where('user_id', Auth::user()->id)->count() > 0;
    }

    public function addToWishList(): bool
    {
        if (!$this->isInWishList()) {
            WishList::create([
                'user_id' => Auth::user()->id,
                'product_id' => $this->id,
            ]);
            return true;
        }
        return false;
    }


}
