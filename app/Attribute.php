<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'profile_id'];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
