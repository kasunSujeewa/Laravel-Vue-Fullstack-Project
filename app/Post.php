<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $with = ['likes', 'dislikes', 'comment', 'user'];
    protected $fillable = [
        'user_id', 'postName', 'description', 'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes()
    {
        return $this->hasMany('App\Like')->where('status', true);
    }
    public function dislikes()
    {
        return $this->hasMany('App\Like')->where('status', false);
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
