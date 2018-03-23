<?php

namespace App\Models\Repositories;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
