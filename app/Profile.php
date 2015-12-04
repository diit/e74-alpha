<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pitch', 'position', 'gender', 'city', 'country', 'website'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attributes()
    {
        return $this->hasMany('App\Attribute');
    }
}
