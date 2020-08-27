<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = [
        'title', 'Autor', 'date','newsid','body','updated_at'
    ];
    public function scopeActive($query)
    {
        $query->where('field_status', 1);
    }
}
