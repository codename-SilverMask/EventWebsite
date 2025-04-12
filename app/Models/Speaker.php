<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
  public function schedules()
  {
    return $this->belongsToMany(Schedule::class, 'schedule_speaker', 'speaker_id', 'schedule_id');
  }
 
}
