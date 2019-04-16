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
        'name', 'email', 'password','phone_number','location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = "affiliate_master";

    public function product(){
        return $this->hasMany(Product::class);
    }



//function to check if the affiliate is active



//checks if the affiliate is active
    public function is_Active(){
        return $this->status==true;
    }
//activating the affiliate's status
    public function activate(){
        $this->status=true;
        $this->save();
    }
//deactivating the affiliate's status
    public function deactivate(){
        $this->status=false;
        $this->save();
    }
    public function conversation(){
        return $this->hasMany(Conversation::class,'affiliate_id');
    }


}
