<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
      return $this->belongsTo('App\UserRole');
    }

    public function message()
    {
      return $this->hasMany('App\Message');
    }

    public function events(){
        return $this->belongsToMany('App\Event');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }
}
