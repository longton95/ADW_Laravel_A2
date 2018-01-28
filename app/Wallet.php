<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
   protected $fillable = ['name', 'bitcoin', 'etherium', 'litecoin'];

   public function user(){

      return $this->belongsTo(User::class);
   }
}
