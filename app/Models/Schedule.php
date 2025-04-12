<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function schedule_day()
    {
        return $this->belongsTo(ScheduleDay::class, 'schedule_day_id');
    }
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'schedule_speaker', 'schedule_id', 'speaker_id');
    }
}
 