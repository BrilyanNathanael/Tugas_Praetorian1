<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleUser extends Model
{
    protected $fillable = [
        'user_id', 'article_id', 'comment'
    ];

    public function replyUser(){
        return $this->belongsToMany('App\User', 'reply_users')->withPivot('article_user_id', 'reply');
    }
}
