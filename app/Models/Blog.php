<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $hidden = ['content',];

    //
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
