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
        'firstname','lastname', 'email', 'password','about','city','country','offering','seeking'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function commentsFromOthers(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function categories(){
        return $this->belongsToMany('App\Category')->withPivot('type');
    }

    public function offerings(){
        return $this->categories()->wherePivot('type', 'offering');
    }

    public function seekings(){
        return $this->categories()->wherePivot('type', 'seeking');
    }

     public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
