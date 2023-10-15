<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ADMIN_USER = 1;
    const NORMAL_USER = 2;

    const USER_VERIFIED = 1;
    const USER_NOT_VERIFIED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'street', 
        'ward', 
        'city', 
        'country', 
        'user_type',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getHasSubscribedAttribute()
    {
        if($this->subscriptions) {
            foreach($this->subscriptions as $subscription) {
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime($subscription->ends_on)));
    
                if(Auth::user()->id == $subscription->user_id
                && $end_date->gt(Carbon::now()->format('Y-m-d H:i:s'))) {
                    return true;
                }
            }
        }
        return false;
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
}
