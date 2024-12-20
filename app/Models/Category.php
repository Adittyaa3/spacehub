<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'facility'
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
