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
    public function check_subscription(){

       if($this->status==true){
           return 'Welcome';
       }
       return "You're banned";
    }


//checks if the affiliate is active
    public function affiliateActive(){
        return $this->status==true;
    }
//activating the affiliate's status
    public function activateAffiliate(){
        $this->status=true;
        $this->save();
    }
//deactivating the affiliate's status
    public function deactivateAffiliate(){
        $this->status=false;
        $this->save();
    }
}
