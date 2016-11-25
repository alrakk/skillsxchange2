<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','content','post_author','post_photo','post_video'];
    
     public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    
}
