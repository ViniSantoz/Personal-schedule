<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
    ];

    /**
     * A priority can be associated with many events.
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}