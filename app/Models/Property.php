<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 
        'price', 
        'house_type_id', 
        'currency', 
        'bedrooms',
        'bathrooms',
        'floors',
        'square_meter',
        'thumbnail',
        'floor_image',
        'premium_image',
        'details'
    ];

    public function houseType(): BelongsTo
    {
        return $this->belongsTo(HouseType::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities')->withPivot(['id','detail']);
    }

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'property_stages')->withPivot(['id','price']);
    }
}
