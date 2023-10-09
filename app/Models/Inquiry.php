<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type', 
        'property_id', 
        'user_id', 
        'description', 
        'photo_path', 
        'delivery_fee', 
        'amount'
    ];

    const TYPE_PURCHASE = "Purchase";
    const TYPE_CUSTOMIZE = "Customize";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function getUserNameAttribute()
    {
        if($this->user) {
            return $this->user->name;
        }
        return "Unknown";
    }

    public function getUserStreetAttribute()
    {
        if($this->user) {
            return $this->user->street;
        }
        return "Unknown";
    }

    public function getUserWardAttribute()
    {
        if($this->user) {
            return $this->user->ward;
        }
        return "Unknown";
    }

    public function getUserCityAttribute()
    {
        if($this->user) {
            return $this->user->city;
        }
        return "Unknown";
    }

    public function getUserCountryAttribute()
    {
        if($this->user) {
            return $this->user->country;
        }
        return "Unknown";
    }
}
