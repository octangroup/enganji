<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['avatar', 'avatar_original'];

    public function getAvatarAttribute()
    {
        return $this->avatar();
    }


    public function avatar(){
        if( $this->getFirstMedia()){
            return $this->getFirstMedia()->getUrl('avatar');
        }
    }

    public function getAvatarOriginalAttribute(){
        if( $this->getFirstMedia()){
            return $this->getFirstMedia()->getUrl('original');
        }
    }

    public function registerMediaConversions(Media $media = null){

        $this->addMediaConversion('avatar')
            ->fit('fill', 120, 120);
        $this->addMediaConversion('original')
            ->fit('fill', 240, 240);


    }
    /*
     * This function defines a relationship between a user and the wish list
     */

    public function wishList(){
        return $this->hasMany(WishList::class,'user_id');
    }

    public function cart(){

        return $this->hasMany(Cart::class);
    }

    public function conversations(){
        return $this->hasMany(Conversation::class,'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'user_id');
    }


}
