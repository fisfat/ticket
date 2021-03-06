<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'title',
    'body',
    'user_id',
  ];

    public function user()
    {
      return $this->belongsTo('App\user');
    }
}
