<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'is_active', 'sort_order'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
