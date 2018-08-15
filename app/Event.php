<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'title',
      'description',
      'user_id',
      'category_id',
      'cover'
    ];

    public function user()
    {
      return $this->belongsToMany('App\User');
    }

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function purchases()
    {
      return $this->hasMany('App\Purchase');
    }
}
