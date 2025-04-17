<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function sponsor_category()
    {
        return $this->belongsTo(SponsorCategory::class);
    }
}
