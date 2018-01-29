<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
   protected $fillable = ['user_id', 'name', 'bitcoin', 'etherium', 'litcoin'];


   public function user(){

      return $this->belongsTo(User::class);
   }
}
