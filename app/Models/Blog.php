<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $connection = 'mysql';
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [];
    protected $guarded = [];

    protected $hidden = ['content',];

    //
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
