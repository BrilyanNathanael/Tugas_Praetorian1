<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'gambar', 'nama', 'judul', 'description',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function commentUser(){
        return $this->belongsToMany('App\User', 'article_users')->withPivot('id','comment');
    }
}
