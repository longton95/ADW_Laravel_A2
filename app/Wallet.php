<?php
namespace App;

use Moloquent;

class Wallet extends Moloquent
{
   protected $fillable = ['user_id', 'name', 'bitcoin', 'etherium', 'litcoin'];


   public function user(){

      return $this->belongsTo(User::class);
   }
}

