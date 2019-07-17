<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [
        'user_id', 'product_id',
    ];
    protected $table = "wish_list";

    /*
     * this function defines the relationship between a wish list and user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
