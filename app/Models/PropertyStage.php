<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStage extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'stage_id', 'price'];
}
