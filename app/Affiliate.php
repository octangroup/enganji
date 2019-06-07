<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Affiliate extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $table = 'affiliate_master';

    public function product()
    {
        return $this->hasMany(Product::class);
    }



//function to check if the affiliate is active


//checks if the affiliate is active
    public function isActive()
    {
        return $this->status == 1;
    }

    public function is_Active()
    {
        return $this->isActive();
    }

//activating the affiliate's status
    public function activate()
    {
        $this->status = 1;
        $this->save();
    }

//deactivating the affiliate's status
    public function deactivate()
    {
        $this->status = 0;
        $this->save();
    }

    public function conversation()
    {
        return $this->hasMany(Conversation::class, 'affiliate_id');
    }


}
