<?php

namespace App\Models;

use App\Helpers\RatingCategoryCalculator;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $fillable = ['user_id', 'product_id', 'rating', 'title', 'body'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ratingCategory(): string
    {
        return RatingCategoryCalculator::handle($this->rating);
    }


}
