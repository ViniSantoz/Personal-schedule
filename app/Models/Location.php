<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'type',
        'link',
    ];

    /**
     * A location can be associated with many events.
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}