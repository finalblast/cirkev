<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tag', 'slug'];


    /**
     * A tag can belong to many posts
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')->orderBy('created_at', 'asc');
    }


    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = $value;
        $this->attributes['slug']  = str_slug($value);
        $this->attributes['tag'] = ucfirst($value);
    }
}
