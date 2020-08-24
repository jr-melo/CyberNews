<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    public function scopeActive($query)
    {
        $query->where('field_status', 1);
    }
}
