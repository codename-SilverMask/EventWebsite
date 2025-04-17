<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorCategory extends Model
{
   public function sponsors()
   {
       return $this->hasMany(Sponsor::class);
   }
}
