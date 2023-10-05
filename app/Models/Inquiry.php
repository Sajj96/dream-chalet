<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'property_id', 'user_id', 'name', 'email', 'street', 'ward', 'city', 'country', 'description', 'photo_path', 'delivery_method', 'amount'];
}
