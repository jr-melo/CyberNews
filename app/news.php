<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = [
        'title', 'body', 'Autor', 'category_id', 'updatefor', 'created_at', 'updated_at', 'news_image'
    ];
    public function scopeActive($query)
    {
        $query->where('field_status', 1);
    }
}
