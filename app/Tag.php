<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class);
    }
}
