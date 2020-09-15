<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyUser extends Model
{
    protected $fillable = [
        'user_id', 'article_user_id', 'reply',
    ];

}
