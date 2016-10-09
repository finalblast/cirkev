<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [ 'title', 'text', 'slug', 'picture', 'group_id', 'video_link', 'user_id', ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function group()
    {
        return $this->belongsTo('App\Group');
    }



    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function images() {
        return $this->hasMany('App\Image');
    }

    /**
     * Create slug from title before storing to DB
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = str_slug($value);
        $this->attributes['title'] = ucfirst($value);
    }


    /**
     * @param  $value
     * @return bool|string
     */
    public function getCreatedAtAttribute( $value )
    {
        return date('j M Y', strtotime( $value ));
    }


    /**
     * @return bool|string
     */
    public function getDatetimeAttribute()
    {
        return date('Y-m-d', strtotime($this->created_at));
    }






//    /**
//     * @return bool|string
//     */
//    public function getTitleAttribute($value) {
//        return ucfirst($value);
//    }


    /**
     * @return string
     */
    public function getTeaserAttribute()
    {
        return word_limiter( $this->text, 60 );
    }


    /**
     * @return mixed|string
     */
    public function getRichTextAttribute()
    {
        return add_paragraphs( filter_url( e($this->text) ) );
    }
}



