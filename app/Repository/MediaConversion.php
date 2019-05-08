<?php
/**
 * Created by PhpStorm.
 * User: Herve
 * Date: 3/20/2019
 * Time: 10:41 AM
 */

namespace App\Repository;


use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

trait MediaConversion
{

    use HasMediaTrait;

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit('fill', 480, 480)
            ->background('fff');
        $this->addMediaConversion('main')
            ->fit('fill', 960, 960)
            ->background('fff')
            ->withResponsiveImages();
    }

}
