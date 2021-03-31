<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function news_has_user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
