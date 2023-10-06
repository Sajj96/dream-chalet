<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    const TYPE_FREE = 0;
    const TYPE_STANDARD = 1;
    const TYPE_PROFESSIONAL = 2;
    const TYPE_ENTERPRISE = 3;
}
