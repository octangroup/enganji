<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $fillable = [
        'id', 'name',
    ];
    protected $table = 'roles';

    /*
     *
     * This function defines a relationship between an admin and role
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_roles', 'role_id', 'admin_id');
    }

    public static function boot()
    {
        parent::boot();
        self::updating(function ($model) {
            $model->slug = Str::kebab($model->name);
        });
        self::saving(function ($model) {
            $model->slug = Str::kebab($model->name);
        });
        self::creating(function ($model) {
            $model->slug = Str::kebab($model->name);
        });
    }
}
