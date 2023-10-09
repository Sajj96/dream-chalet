<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'property_id',
        'comments',
        'star_rating'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
