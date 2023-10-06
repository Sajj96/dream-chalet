<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type', 
        'property_id', 
        'user_id', 
        'name', 
        'email', 
        'mobile',
        'street', 
        'ward', 
        'city', 
        'country', 
        'description', 
        'photo_path', 
        'delivery_method', 
        'amount'
    ];

    const TYPE_PURCHASE = "Purchase";
    const TYPE_CUSTOMIZE = "Customize";
}
