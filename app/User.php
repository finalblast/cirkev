<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'info_popis',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('created_at', 'desc');
    }

    public function getCreatedAtAttribute( $value )
    {
        return date('j M Y', strtotime( $value ));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug']  = str_slug($value);
        $this->attributes['name'] = ucfirst($value);
    }
}
