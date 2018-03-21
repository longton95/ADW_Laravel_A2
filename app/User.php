<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $collection = 'users';

    protected $fillable = [
        'firstName', 'lastName', 'email', 'role', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function userID(){

     return $this->id;
  }

   public function wallets(){

      return $this->hasMany(Wallet::class);
   }
}
