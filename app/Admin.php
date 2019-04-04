<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    public function category(){

        return $this->hasMany(Category::class);
    }

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

    protected $table = "admin_master";

    /*
    *
    * This function defines a relationship between a role and an admin
    */
     public function roles(){
        return $this->belongsToMany(Role::class,'admin_roles','admin_id','role_id');
    }

    public function authorizeRole($role): bool
    {
        return  $this->roles()->where('slug', $role)->count() > 0;
    }

    public function canManageProducts(): bool
    {
        return $this->authorizeRole('manage-product');
    }

    public function canManageCommunication(): bool
    {
        return $this->authorizeRole('communication');
    }

    public function canManageAffiliates(): bool
    {
        return $this->authorizeRole('manage-affiliate');
    }

    public function canUpdateContent(): bool
    {
        return $this->authorizeRole('update-content');
    }

    /*
     * checks if the admin is active
     */

    public function is_Active(){
        return $this->status==true;
    }
    /*
     * activating the admin's status
     */

    public function activate(){
        $this->status=true;
        $this->save();
    }
    /*
  * deactivating the admin's status
  */

    public function deactivate(){
        $this->status=false;
        $this->save();
    }
}
