<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type', 
        'property_id', 
        'user_id', 
        'first_name',
        'last_name', 
        'email', 
        'mobile',
        'street', 
        'ward', 
        'city', 
        'country', 
        'description', 
        'amount'
    ];

    const TYPE_SUBSCRIPTION = "Subscription";
    const TYPE_INQUIRY = "Inquiry";
}
