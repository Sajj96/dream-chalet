<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 
        'user_id', 
        'plan_id',
        'ends_on'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getPlanTypeAttribute()
    {
        if ($this->plan) {
            return $this->plan->type;
        } else {
            return "Unknown";
        }
    }

    public function getPlanPeriodAttribute()
    {
        if ($this->plan) {
            return $this->plan->period;
        } else {
            return "Unknown";
        }
    }
}
