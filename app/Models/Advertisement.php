<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Advertisement extends Model implements HasMedia
{
    use HasMediaTrait;
    //
    protected $appends = ['thumbnail', 'picture'];

    protected $fillable = ['admin_id', 'title', 'body', 'product_listing', 'home_page', 'link', 'starting_on', 'ending_on'];

    public function registerMediaConversions(Media $media = null)
    {

        $this->addMediaConversion('thumb')
            ->fit('fill', 600, 200);
        $this->addMediaConversion('main')
            ->fit('crop', 1500, 500);
    }

    public function getThumbnailAttribute()
    {
        if ($this->getFirstMedia()) {
            return $this->getFirstMedia()->getUrl('thumb');
        }
        return null;
    }

    public function getPictureAttribute()
    {
        if ($this->getFirstMedia()) {
            return $this->getFirstMedia()->getUrl('main');
        }
        return null;
    }
}
