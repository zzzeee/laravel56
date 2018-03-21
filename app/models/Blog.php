<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function author()
    {
        return $this->hasOne('App\models\User', 'id', 'user_id');
    }
}
