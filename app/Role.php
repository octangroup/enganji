<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
       'id', 'name',
    ];
    protected $table= 'roles';
    /*
     *
     * This function defines a relationship between an admin and role
     */
    public function admin(){
        return $this->belongsToMany(Admin::class,'admin_roles','role_id','admin_id');
    }

    public static function boot()
    {
        parent::boot();
        self::updating(function ($model) {
            $model->slug =kebab_case($model->name);
        });
        self::saving(function ($model) {
            $model->slug = kebab_case($model->name);
        });
        self::creating(function ($model) {
            $model->slug = kebab_case($model->name);
        });
    }
}
