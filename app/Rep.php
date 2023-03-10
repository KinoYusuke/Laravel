<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
    protected $fillable = ['user_id', 'post_id'];
    public function post()
    {
        return $this->belongsTo('App\post', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\user', 'user_id', 'id');
    }
}
