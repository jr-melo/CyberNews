<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{

    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function scopeActive($query)
    {
        $query->where('field_status', 1);
    }
}
