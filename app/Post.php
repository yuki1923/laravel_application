<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body'];

    public function user()
    {
        //多対1の関係になることを定義「１人のユーザーには複数の投稿をもつこと」
        return $this->belongsTo('App\User');
    }
}
