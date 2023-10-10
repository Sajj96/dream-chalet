<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
        'roofs',
        'blocks',
        'floors',
        'square_meter',
        'thumbnail',
        'floor_image',
        'premium_image',
        'details',
        'clicks'
    ];

    public function houseType(): BelongsTo
    {
        return $this->belongsTo(HouseType::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities')->withPivot(['id']);
    }

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'property_stages')->withPivot(['id','price']);
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getHouseTypeNameAttribute()
    {
        if($this->houseType){
            return $this->houseType->name;
        } else {
            return "Unknown";
        }
    }

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'subscriptions')->withPivot(['id', 'plan_id', 'ends_on']);
    }

    public function getHasUserSubscribedAttribute()
    {
        if($this->subscriptions && Auth::check()) {
            foreach($this->subscriptions as $subscription) {
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime($subscription->pivot->ends_on)));
    
                if($this->id == $subscription->pivot->property_id 
                && Auth::user()->id == $subscription->pivot->user_id
                && $end_date->gt(Carbon::now()->format('Y-m-d H:i:s'))) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getPlanTypeAttribute()
    {
        foreach($this->subscriptions as $subscript) {
            $plan = Plan::find($subscript->pivot->plan_id);

            if($plan->id == $subscript->pivot->plan_id) {
                return $plan->type;
            } else {
                return "Unknown";
            }
        } 
    }

    public function getPlanPeriodAttribute()
    {
        foreach($this->subscriptions as $subscript) {
            $plan = Plan::find($subscript->pivot->plan_id);

            if($plan->id == $subscript->pivot->plan_id) {
                return $plan->period;
            } else {
                return "Unknown";
            }
        } 
    }

    public function getReviewAttribute()
    {
        $reviews_count = array(); $ones = array(); $twos = array(); $three = array(); $four = array(); $five = array();
        $average = 0;
        $rate = 0;

        foreach ($this->reviews as $key => $review) {
            if ($this->id == $review->property_id) {
                if ($review->star_rating == 1) {
                    array_push($ones, $key);
                }
                if ($review->star_rating == 2) {
                    array_push($twos, $key);
                }
                if ($review->star_rating == 3) {
                    array_push($three, $key);
                }
                if ($review->star_rating == 4) {
                    array_push($four, $key);
                }
                if ($review->star_rating == 5) {
                    array_push($five, $key);
                }
                array_push($reviews_count, $key);
                $average = (count($ones) + count($twos) + count($three) + count($four) + count($five));
                $rate = ((1 * count($ones)) + (2 * count($twos)) + (3 * count($three)) + (4 * count($four)) + (5 * count($five)));
            }
        }

        $rate = ($average > 0) ? $rate/$average : 0;

        return (object) array(
            'rate' => $rate,
            'review_count' => count($reviews_count)
        );
    }
}
